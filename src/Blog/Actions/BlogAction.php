<?php

namespace App\Blog\Actions;

use Framework\Renderer\RendererInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Class BlogAction
 * @author Lievens Benjamin <l.benjamin185@gmail.com>
 */
class BlogAction
{

    /**
     * @var RendererInterface
     */
    private $renderer;

    /**
     * BlogAction constructor.
     * @param RendererInterface $renderer
     */
    public function __construct(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @param Request $request
     * @return string
     */
    public function __invoke(Request $request) : string
    {
        $slug = $request->getAttribute('slug');
        if ($slug) {
            return $this->show($slug);
        }
        return $this->index();
    }

    /**
     * @return string
     */
    public function index() : string
    {
        return $this->renderer->render('@blog/index');
    }

    /**
     * @param string $slug
     * @return string
     */
    public function show(string $slug) : string
    {
        return $this->renderer->render('@blog/show', compact('slug'));
    }
}
