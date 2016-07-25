<?php

namespace Larapacks\Table;

use Illuminate\Contracts\Support\Renderable;

class Table implements Renderable
{
    /**
     * @var \Larapacks\Table\Generator
     */
    protected $generator;

    /**
     * Constructor.
     *
     * @param \Closure $closure
     */
    public function __construct(\Closure $closure)
    {
        $generator = new Generator();

        call_user_func($closure, $generator);

        $this->generator = $generator;
    }

    /**
     * Renders the table.
     *
     * @return string
     */
    public function render()
    {
        return view('table::template', ['table' => $this->generator])->render();
    }
}
