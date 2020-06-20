<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Categories;
use App\Models\Posts;
use App\Repositories\CategoryRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $paginator = Categories::paginate(15);
        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $item = new Categories();
        $categoryList = Categories::all();

        return view('blog.admin.categories.edit',
            compact('item', 'categoryList'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(CategoryCreateRequest $request)
    {
        $data = $request->input();// Получение данных которые пришли с формы
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        // Создание объекта и добавление в БД
        $item = (new Categories())->create($data);

        if ($item) {
            return redirect()->route('blog.admin.categories.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param CategoryRepository $categoryRepository
     * @return Factory|View
     */
    public function edit($id, CategoryRepository $categoryRepository)
    {
        $item = $categoryRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }
        $categoryList = $categoryRepository->getForComboBox();

        return view('blog.admin.categories.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @param CategoryUpdateRequest
     * @return RedirectResponse
     */
    public function update(CategoryUpdateRequest $request, $id)   // Интсрументарий для рабоыт с входящими данными, валидатор
    {
        $item = Categories::find($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->input();    //Получение массива всех данных которые пришли с запросом
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}
