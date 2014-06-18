<?php
use Zero\Validators\SentenceValidator;

/**
 * Class SentencesApiController
 */
class SentencesApiController extends \ApiController {
    /**
     * @var string
     */
    protected $model = 'Sentence';

    /**
     * @param SentenceValidator $validator
     */
    public function __construct(SentenceValidator $validator)
    {
        parent::__construct($validator);
    }

    /**
     * Store a new sentence and sync tags.
     *
     * @param null $id
     * @return Response
     * @throws Zero\Validators\InputValidationException
     */
    public function store($id = null)
    {
        $input = Input::all();
        $this->validator->validate($input);
        $sentence = Sentence::create($input);
        $sentence->tags()->sync($input['tags']);

        return Response::api($sentence);
    }

    /**
     * Update a sentence and their tags.
     *
     * @param int $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::all();
        $this->validator->changeRulesToUpdate()->validate($input);

        // Avoid to update user_id
        unset($input['user_id']);

        // Update sentence
        $sentence = Sentence::findOrFail($id);
        $sentence->update($input);

        $removeAllTags = Input::get('remove_all_tags', false);
        $addTags       = Input::get('add_tags');
        $removeTags    = Input::get('remove_tags');

        // Remove all tags or manually sync
        if ($removeAllTags) {
            $sentence->tags()->detach();
        } else {
            // Add new tags
            if (!empty($addTags)) {
                // Filter current tags to avoid duplicated relations.
                $currentTagIds = $sentence->tags()->lists('tag_id');
                $diffTags = array_diff($addTags, $currentTagIds);

                foreach ($diffTags as $tagId) {
                    $sentence->tags()->attach($tagId);
                }
            }

            // Remove tags
            if (!empty($removeTags)) {
                $sentence->tags()->detach($removeTags);
            }
        }

        return Response::api($sentence->transform());
    }
} 