<?php
use Zero\Transform\Transform;
use Zero\Validators\InputValidator;

/**
 * Class ApiController
 */
abstract class ApiController extends \BaseController {
    /**
     * Model
     *
     * @var string
     */
    protected $model;

    /**
     * Limit for index() method
     *
     * @var int
     */
    protected $limit = 20;

    /**
     * @var InputValidator
     */
    protected $validator;

    /**
     * @param InputValidator $validator
     */
    public function __construct(InputValidator $validator)
    {
        $this->validator = $validator;

        // Add basic auth filters
        $filterOptions = ['on' => ['post', 'put', 'patch', 'delete']];
        $this->beforeFilter('auth.basic.once', $filterOptions);
        $this->beforeFilter('auth.basic.status', $filterOptions);
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$resources = $this->getResources();
        return Response::api(Transform::collection($resources));
	}


	/**
	 * Store a newly created resource in storage.
     * If $id is present the the resource will be updated.
	 *
     * @param  int  $id
	 * @return Response
	 */
	public function store($id = null)
	{
		$model = $this->model;
        $input = Input::all();
        $this->validator->validate($input);

        if ($id === null) {
            $resource = $model::create($input);
        } else {
            $resource = $model::findOrFail($id);
            $resource->update($input);
        }

        return Response::api($resource->transform());
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$model = $this->model;
        $resource = $model::findOrFail($id);
        return Response::api($resource->transform());
    }


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return $this->store($id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$model = $this->model;
        $model::destroy($id);
        return Response::api(null, 'Resource destroyed');
	}


    /**
     * Return the resources for the index() method.
     *
     * @return mixed
     */
    protected function getResources()
    {
        $model   = $this->model;
        $sinceId = Input::get('since', 0);

        return $model::query()
            ->where('id', '>=', $sinceId)
            ->limit(Input::get('limit', $this->limit))
            ->get();
    }
}
