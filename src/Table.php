<?php

namespace Larapacks\Table;

use Illuminate\Contracts\Support\Renderable;

class Table implements Renderable
{
    /**
     * @var \Larapacks\Table\Builder
     */
    protected $generator;

    /**
     * Constructor.
     *
     * @param \Closure $closure
     */
    public function __construct(\Closure $closure)
    {
        $generator = new Builder();

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
        return view($this->template(), ['table' => $this->generator])->render();
    }

    /**
     * Returns the configured view template.
     *
     * @return string
     */
    protected function template()
    {
        return config('table.template', 'table::template');
    }
}
