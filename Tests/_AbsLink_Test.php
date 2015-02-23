<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/core
 */

namespace _Chain_;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class _AbsLink_Test extends \PHPUnit_Framework_TestCase
{
    const ABSLINK = '_Chain_\_AbsLink_';

    public function test_X_()
    {
        $link = $this->getMockForAbstractClass(self::ABSLINK);
        $this->assertFalse($link->_X_());
        $this->assertTrue($link->_X_(true));
    }
}
