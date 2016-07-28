<?php

namespace Larapacks\Table;

use Illuminate\Contracts\Support\Renderable;

class Table implements Renderable
{
    /**
     * The table builder instance.
     *
     * @var \Larapacks\Table\Builder
     */
    protected $builder;

    /**
     * Constructor.
     *
     * @param \Closure $closure
     */
    public function __construct(\Closure $closure)
    {
        $builder = new Builder();

        call_user_func($closure, $builder);

        $this->builder = $builder;
    }

    /**
     * Renders the table.
     *
     * @return string
     */
    public function render()
    {
        return view($this->template(), ['table' => $this->builder])->render();
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
