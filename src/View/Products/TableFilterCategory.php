<?php


namespace App\View\Products;


use App\Entity\Product\CategoryProduct;
use App\Helper\FilterSanitize;
use App\Helper\RenderHtml;
use App\Repository\ProductRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class TableFilterCategory
{
    use RenderHtml;

    private ProductRepository $repository;
    private FilterSanitize $sanitize;
    private CategoryProduct $category;

    public function __construct(ProductRepository $repository, FilterSanitize $sanitize, CategoryProduct $category)
    {
        $this->repository = $repository;
        $this->sanitize = $sanitize;
        $this->category = $category;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $idCategory = $this->sanitize->int($request->getQueryParams()['category'],'Categoria invalida');
            $this->category->setIdCategory($idCategory);

            $template = $this->render('products/table-filter-category.php', [
                'title' => 'Tabela Categoria',
                'allCategories' => $this->repository->bringAllCategories(),
                'productsOnlyCategory' => $this->repository->bringOnlyCategory($this->category)
            ]);
            return new Response(200, [], $template);

        } catch (Exception $error) {
            return new Response(200, ['Location' => '']);
        }


    }
}