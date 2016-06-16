<?php
/**
 * This file is part of the "Easy System" package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Damon Smith <damon.easy.system@gmail.com>
 */
namespace Es\Server\Test;

use Es\Server\Server;
use Es\Services\Provider;
use Es\Services\Services;

class ServerTraitTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        require_once 'ServerTraitTemplate.php';
    }

    public function testSetServer()
    {
        $services = new Services();
        Provider::setServices($services);

        $server   = new Server();
        $template = new ServerTraitTemplate();
        $template->setServer($server);
        $this->assertSame($server, $services->get('Server'));
    }

    public function testGetServer()
    {
        $server   = new Server();
        $services = new Services();
        $services->set('Server', $server);

        Provider::setServices($services);
        $template = new ServerTraitTemplate();
        $this->assertSame($server, $template->getServer());
    }
}
