<?php
namespace IttyIt\CheckerBoard;

class CheckerBoardApplication
{
    public function execute()
    {
        try {
            $options = $this->getUserOptions();

            $rows = $options['rows'];
            $cols = $options['cols'];

            $checkBoard = new CheckerBoard($rows, $cols);

            $this->draw($checkBoard);

            return 0;

        } catch (\Exception $e) {
            echo $e->getMessage();
            return 1;
        }
    }

    /**
     * @return array
     * @throws \Exception
     */
    private function getUserOptions()
    {
        $options = getopt(
            null,
            array(
                "cols:",
                "rows:"
            )
        );

        if (!isset($options['cols']) || !isset($options['rows']) ) {
            throw new \Exception("Usage: checkerboard-drawer --cols [number] --rows [number] \n");
        }

        if (!is_numeric(($options['cols'])) || !is_numeric(($options['rows']))) {
            throw new \Exception("Not a number!\nUsage: checkerboard-drawer --cols [number] --rows [number] \n");
        }

        if ($options['cols'] > 20 || $options['rows'] > 20) {
            throw new \Exception("Doesn't have to be that large! --cols 20 and --rows 20 is big enought\nUsage: checkerboard-drawer --cols [number] --rows [number] \n");
        }

        return $options;
    }

    /**
     * @param CheckerBoard $checkBoard
     * @return void
     */
    private function draw(CheckerBoard $checkBoard)
    {
        echo $checkBoard->title();
        echo $checkBoard->buildCheckerBoard();
    }
} 