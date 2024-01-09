<?php

namespace OnlineMarket\FlexContent;

use Laravel\Nova\Fields\Field;

class FlexContent extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'flex-content';

    public function hideFromIndex($callback = true)
    {
        $this->showOnIndex = is_callable($callback) ? function () use ($callback) {
            return ! call_user_func_array($callback, func_get_args());
        }
            : ! $callback;

        return $this;
    }
}
