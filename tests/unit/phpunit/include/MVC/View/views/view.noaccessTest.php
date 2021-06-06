<?php

use SuiteCRM\Tests\SuiteCRM\Test\SuitePHPUnitFrameworkTestCase;

class ViewNoaccessTest extends SuitePHPUnitFrameworkTestCase
{
    public function testdisplay(): void
    {
        //execute the method and check for default attributes and check that it returns some html.
        $view = new ViewNoaccess();

        ob_start();

        $view->display();

        $renderedContent = ob_get_contents();
        ob_end_clean();

        self::assertAttributeEquals('noaccess', 'type', $view);
        self::assertGreaterThan(0, strlen($renderedContent));

        self::assertEquals(false, json_decode($renderedContent)); //check that it doesn't return json.
    }
}
