<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2015, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

use PHPUnit\Framework\TestCase;

/**
 * Test case used to test the <code>Chrome</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  ChromeTest
 */
class ChromeTest extends TestCase
{
    /**
     * Test method for the <code>#create()</code> function;
     */
    public function testCreate()
    {
        $this->assertNotNull(Chrome::create());
    }
    
    /**
     * Test method for the <code>#getGcmTtl()</code> and <code>setGcmTtl($gctTtl)</code> functions.
     */
    public function testGetSetGcmTtl()
    {
        $chrome = new Chrome();
        $this->assertSame($chrome, $chrome->setGcmTtl(3600));
        $this->assertSame(3600, $chrome->getGcmTtl());
    }
    
    /**
     * Test method for the <code>#getIcon()</code> and <code>#setIcon($icon)</code> functions.
     */
    public function testGetSetIcon()
    {
        $chrome = new Chrome();
        $this->assertSame($chrome, $chrome->setIcon('icon'));
        $this->assertSame('icon', $chrome->getIcon());
    }
    
    /**
     * Test method for the <code>#getTitle()</code> and <code>#setTitle($title)</code> functions.
     */
    public function testGetSetTitle()
    {
        $chrome = new Chrome();
        $this->assertSame($chrome, $chrome->setTitle('Title'));
        $this->assertSame('Title', $chrome->getTitle());
    }

    /**
     * Test method for the <code>#getImage()</code> and <code>#setImage($image)</code> functions.
     */
    public function testGetSetImage()
    {
        $chrome = new Chrome();
        $this->assertSame($chrome, $chrome->setImage('Image'));
        $this->assertSame('Image', $chrome->getImage());
    }    
    
    /**
     * Test method for the <code>#jsonSerialize()</code> function.
     */
    public function testJsonSerialize()
    {
        $array = Chrome::create()
            ->setGcmTtl(3600)
            ->setIcon('icon')
            ->setTitle('Title')
            ->setImage('Image')
            ->setButtonText1('ButtonText1')
            ->setButtonUrl1('ButtonUrl1')
            ->setButtonText2('ButtonText2')
            ->setButtonUrl2('ButtonUrl2')
            ->jsonSerialize();
        
        $this->assertCount(8, $array);
        $this->assertSame(3600, $array['chrome_gcm_ttl']);
        $this->assertSame('icon', $array['chrome_icon']);
        $this->assertSame('Title', $array['chrome_title']);
        $this->assertSame('Image', $array['chrome_image']);
        $this->assertSame('ButtonText1', $array['chrome_button_text1']);
        $this->assertSame('ButtonUrl1', $array['chrome_button_url1']);
        $this->assertSame('ButtonText2', $array['chrome_button_text2']);
        $this->assertSame('ButtonUrl2', $array['chrome_button_url2']);
    }
}
