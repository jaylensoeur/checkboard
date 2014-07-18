<?php
namespace IttyIt\CheckerBoard;

class CheckerBoard implements CheckerBoardInterface
{
    /** @var int $columnNumber */
    private $columnNumber;

    /** @var int $rowNumber */
    private $rowNumber;

    /** @var int $size */
    private $size = 5;

    /**
     * @param int $columnNumber
     * @param int $rowNumber
     */
    public function __construct($columnNumber = 4, $rowNumber = 4 )
    {
        $this->columnNumber = $columnNumber;
        $this->rowNumber = $rowNumber;
    }

    /**
     * @return string
     */
    public function buildCheckerBoard()
    {
        $string = '';

        $length = $this->size * $this->rowNumber;

        for($j = 0; $j < $this->columnNumber; $j++) {

            /**
             * construct top of checkerboard
             */
            $string .= $this->verticalBorder($length, $this->size);

            if ($j % 2) {
                /**
                 * don't fill square
                 * */
                $string .= $this->buildSquare($length, $this->size, false);
            }else {
                /**
                 * fill square
                 * */
                $string .= $this->buildSquare($length, $this->size, true);
            }
        }

        /**
         * construct bottom of checkerboard
         */
        $string .= $this->verticalBorder($length, $this->size);

        return $string;
    }

    /**
     * @return string
     */
    public function title()
    {
        $string = '';
        $string .=  "Drawing checker board\n";
        $string .= "Row      : ".$this->columnNumber."\n";
        $string .=  "Column   : ".$this->rowNumber."\n";

        return $string;
    }

    /**
     * @param $length
     * @param $size
     * @return string
     */
    private function verticalBorder($length, $size)
    {
        $string = '';

        for($i = 0; $i < $length+1; $i++)
        {
            if ($i % $size) {
                $string .= "-";
            }else {
                $string .= "+";
            }
        }

        $string .= "\n";

        return $string;
    }

    /**
     * @param $length
     * @param $size
     * @param bool $bool
     * @return string
     */
    private function buildSquare($length, $size, $bool = false)
    {
        $string = '';

        $string .= $this->linePattern($length, $size, $bool);
        $string .= $this->linePattern($length, $size, $bool);

        return $string;
    }

    /**
     * @param $length
     * @param $size
     * @param bool $fill
     * @return string
     */
    private function linePattern($length, $size, $fill = false)
    {
        $shape1 = '#';
        $shape2 = ' ';

        $string = '';

        if ($fill) {
            $shape1 = ' ';
            $shape2 = '#';
        }

        $counter = 0;

        for($i = 0; $i < $length; $i++)
        {
            if ($i == 0 ) {
                $string .= "|";
            }

            if ($counter < $size-1) {
                $string .= $shape1;
            }else {
                $string .= "|";
            }

            $counter++;

            if ($counter == $size) {
               $counter = 0;
               $this->swap($shape1, $shape2);
            }
        }

        $string .= "\n";

        return $string;
    }

    /**
     * @param $item1
     * @param $item2
     */
    private function swap(&$item1, &$item2)
    {
        $temp = $item2;
        $item2 = $item1;
        $item1 = $temp;
    }
}
