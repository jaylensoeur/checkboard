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
        $options = getopt(null,array(
                "cols:",
                "rows:"
            )
        );

        if (!isset($options['cols']) || !isset($options['rows'])) {
            throw new \Exception("Usage: checkerboard-drawer --cols [number] --rows [number] \n");
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