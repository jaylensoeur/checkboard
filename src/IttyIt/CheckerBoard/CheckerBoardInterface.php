<?php
namespace IttyIt\CheckerBoard;

interface CheckerBoardInterface
{
    /**
     * @return mixed
     */
    public function buildCheckerBoard();

    /**
     * @return string
     */
    public function title();

} 