<?php

class Paginate
{

    public $current_page;

    public $items_page;

    public $items_count;

    public function __construct($page = 1, $items_page = 4, $items_count = 0)
    {
        $this->current_page = (int) $page;
        $this->items_page = (int) $items_page;
        $this->items_count = (int) $items_count;
    }

    public function next()
    {
        return $this->current_page + 1;
    }

    public function prvious()
    {
        return $this->current_page - 1;
    }

    public function page_total()
    {
        return ceil($this->items_count / $this->items_page);
    }

    public function has_next()
    {
        return $this->next() <= $this->page_total() ? TRUE : FALSE;
    }

    public function has_previous()
    {
        return $this->prvious() >= 1 ? TRUE : FALSE;
    }

    public function offset()
    {
        return ($this->current_page - 1) * $this->items_page;
    }
}

?>