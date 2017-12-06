<?php
/**
 * Unit tests for PHP_CompatInfo package, issues reported
 *
 * PHP version 5
 *
 * @category   PHP
 * @package    PHP_CompatInfo
 * @subpackage Tests
 * @author     Laurent Laville <pear@laurent-laville.org>
 * @author     Remi Collet <Remi@FamilleCollet.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version    GIT: $Id$
 * @link       http://php5.laurent-laville.org/compatinfo/
 * @since      Class available since Release 4.0.0-alpha2+1
 */

namespace Bartlett\Tests\CompatInfo;

use Bartlett\Reflect\Client;

/**
 * Tests for PHP_CompatInfo, retrieving reference elements,
 * and versioning information.
 *
 * @category   PHP
 * @package    PHP_CompatInfo
 * @subpackage Tests
 * @author     Laurent Laville <pear@laurent-laville.org>
 * @author     Remi Collet <Remi@FamilleCollet.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version    Release: @package_version@
 * @link       http://php5.laurent-laville.org/compatinfo/
 */
class PhpFeaturesIssueTest extends \PHPUnit_Framework_TestCase
{
    const GH140 = 'gh140.php';
    const GH141 = 'gh141.php';
    const GH142 = 'gh142.php';
    const GH143 = 'gh143.php';
    const GH148 = 'gh148.php';
    const GH154 = 'gh154.php';
    const GH168 = 'gh168.php';
    const GH200 = 'gh200.php';
    const GH207 = 'gh207.php';
    const GH211 = 'gh211.php';
    const GH213 = 'gh213.php';
    const GH215 = 'gh215.php';
    const GH218 = 'gh218.php';
    const GH222 = 'gh222.php';
    const GH226 = 'gh226.php';
    const GH227 = 'gh227.php';
    const GH228 = 'gh228.php';
    const GH229 = 'gh229.php';
    const GH231 = 'gh231.php';
    const GH238 = 'gh238.php';

    protected static $fixtures;
    protected static $analyserId;
    protected static $api;

    /**
     * Sets up the shared fixture.
     *
     * @return void
     */
    public static function setUpBeforeClass()
    {
        self::$fixtures = __DIR__ . DIRECTORY_SEPARATOR
            . 'fixtures' . DIRECTORY_SEPARATOR;

        self::$analyserId = 'Bartlett\CompatInfo\Analyser\CompatibilityAnalyser';

        $client = new Client();

        // request for a Bartlett\Reflect\Api\Analyser
        self::$api = $client->api('analyser');
    }

    /**
     * Regression test for feature GH#140
     *
     * @link https://github.com/llaville/php-compat-info/issues/140
     *       Constant scalar expressions are 5.6+
     * @link http://php.net/manual/en/migration56.new-features.php#migration56.new-features.const-scalar-exprs
     * @group features
     * @group regression
     * @return void
     */
    public function testFeatureGH140()
    {
        $dataSource = self::$fixtures . self::GH140;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];

        $this->assertEquals(
            array(
                'php.min'      => '5.6.0',
                'php.max'      => '',
                'php.all'      => '5.6.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#141
     *
     * @link https://github.com/llaville/php-compat-info/issues/141
     *       Variadic functions are 5.6+
     * @link http://php.net/manual/en/migration56.new-features.php#migration56.new-features.variadics
     * @group features
     * @group regression
     * @return void
     */
    public function testFeatureGH141()
    {
        $dataSource = self::$fixtures . self::GH141;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];

        $this->assertEquals(
            array(
                'php.min'      => '5.6.0',
                'php.max'      => '',
                'php.all'      => '5.6.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#142
     *
     * @link https://github.com/llaville/php-compat-info/issues/142
     *       Exponentiation is 5.6+
     * @link http://php.net/manual/en/migration56.new-features.php#migration56.new-features.exponentiation
     * @group features
     * @return void
     */
    public function testFeatureGH142()
    {
        $dataSource = self::$fixtures . self::GH142;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];

        $this->assertEquals(
            array(
                'php.min'      => '5.6.0',
                'php.max'      => '',
                'php.all'      => '5.6.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#143
     *
     * @link https://github.com/llaville/php-compat-info/issues/143
     *       use const, use function are 5.6+
     * @link http://php.net/manual/en/migration56.new-features.php#migration56.new-features.use
     * @group features
     * @return void
     */
    public function testFeatureGH143()
    {
        $dataSource = self::$fixtures . self::GH143;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];

        $this->assertEquals(
            array(
                'php.min'      => '5.6.0',
                'php.max'      => '',
                'php.all'      => '5.6.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#148
     *
     * @link https://github.com/llaville/php-compat-info/issues/148
     *       Array short syntax and array dereferencing not detected
     * @link http://php.net/manual/en/migration54.new-features.php
     * @group features
     * @group regression
     * @return void
     */
    public function testBugGH148()
    {
        $dataSource = self::$fixtures . self::GH148;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];

        $this->assertEquals(
            array(
                'php.min'      => '5.4.0',
                'php.max'      => '',
                'php.all'      => '5.4.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#154
     *
     * @link https://github.com/llaville/php-compat-info/issues/154
     *       Class member access on instantiation
     * @link http://php.net/manual/en/migration54.new-features.php
     * @group features
     * @group regression
     * @return void
     */
    public function testBugGH154()
    {
        $dataSource = self::$fixtures . self::GH154;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];

        $this->assertEquals(
            array(
                'php.min'      => '5.4.0',
                'php.max'      => '',
                'php.all'      => '5.4.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#168
     *
     * @link https://github.com/llaville/php-compat-info/issues/168
     *       Wrong version on global const variable definition
     * @group features
     * @group regression
     * @return void
     */
    public function testBugGH168()
    {
        $dataSource = self::$fixtures . self::GH168;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];
        $constants  = $metrics[self::$analyserId]['constants'];

        $this->assertEquals(
            array(
                'php.min'      => '5.3.0',
                'php.max'      => '',
                'php.all'      => '5.3.0',
            ),
            $versions
        );

        $this->assertEquals(
            array(
                'ext.name'     => 'user',
                'ext.min'      => '',
                'ext.max'      => '',
                'ext.all'      => '',
                'php.min'      => '4.0.0',
                'php.max'      => '',
                'php.all'      => '4.0.0',
                'matches'      => 0,
            ),
            $constants['BAR']
        );

        $this->assertEquals(
            array(
                'ext.name'     => 'user',
                'ext.min'      => '',
                'ext.max'      => '',
                'ext.all'      => '',
                'php.min'      => '5.3.0',
                'php.max'      => '',
                'php.all'      => '5.3.0',
                'matches'      => 1,
            ),
            $constants['FOO']
        );
    }

    /**
     * Regression test for feature GH#200
     *
     * @link https://github.com/llaville/php-compat-info/issues/200
     *       goto statement is not checked
     * @link http://php.net/manual/en/control-structures.goto.php
     * @group features
     * @return void
     */
    public function testFeatureGH200()
    {
        $dataSource = self::$fixtures . self::GH200;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];

        $this->assertEquals(
            array(
                'php.min'      => '5.3.0',
                'php.max'      => '',
                'php.all'      => '5.3.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#207
     *
     * @link https://github.com/llaville/php-compat-info/pull/207
     *       goto statement is not checked
     * @link http://php.net/manual/en/migration55.new-features.php#migration55.new-features.empty
     * @group features
     * @return void
     */
    public function testFeatureGH207()
    {
        $dataSource = self::$fixtures . self::GH207;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];

        $this->assertEquals(
            array(
                'php.min'      => '5.5.0',
                'php.max'      => '',
                'php.all'      => '5.5.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#211
     *
     * @link https://github.com/llaville/php-compat-info/issues/211
     *       PHP 5.6 **-Operator not recognized
     * @link http://php.net/manual/en/migration56.new-features.php#migration56.new-features.exponentiation
     * @group features
     * @return void
     */
    public function testFeatureGH211()
    {
        $dataSource = self::$fixtures . self::GH211;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];

        $this->assertEquals(
            array(
                'php.min'      => '5.6.0',
                'php.max'      => '',
                'php.all'      => '5.6.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#213
     *
     * @link https://github.com/llaville/php-compat-info/issues/213
     *       Dynamic access to static methods and properties are not detected
     * @link http://php.net/manual/en/migration53.new-features.php
     * @group features
     * @return void
     */
    public function testFeatureGH213()
    {
        $dataSource = self::$fixtures . self::GH213;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];
        $this->assertEquals(
            array(
                'php.min'      => '5.3.0',
                'php.max'      => '',
                'php.all'      => '5.3.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#215
     *
     * @link https://github.com/llaville/php-compat-info/issues/215
     *       Constant expressions with scalar expression not detected
     * @link http://php.net/manual/en/migration56.new-features.php
     * @group features
     * @return void
     */
    public function testFeatureGH215()
    {
        $dataSource = self::$fixtures . self::GH215;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];
        $this->assertEquals(
            array(
                'php.min'      => '5.6.0',
                'php.max'      => '',
                'php.all'      => '5.6.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#218
     *
     * @link https://github.com/llaville/php-compat-info/issues/218
     *       "::class" not detected as php 5.5
     * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.class.class
     * @group features
     * @return void
     */
    public function testFeatureGH218()
    {
        $dataSource = self::$fixtures . self::GH218;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];
        $this->assertEquals(
            array(
                'php.min'      => '5.5.0',
                'php.max'      => '',
                'php.all'      => '5.5.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#222
     *
     * @link https://github.com/llaville/php-compat-info/issues/222
     *       Negative constant marked as PHP 5.6
     * @group features
     * @return void
     */
    public function testFeatureGH222()
    {
        $dataSource = self::$fixtures . self::GH222;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];
        $this->assertEquals(
            array(
                'php.min'      => '4.0.0',
                'php.max'      => '',
                'php.all'      => '4.0.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#226
     *
     * @link https://github.com/llaville/php-compat-info/issues/226
     *       Does not detect Generators
     * @group features
     * @return void
     */
    public function testFeatureGH226()
    {
        $dataSource = self::$fixtures . self::GH226;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];
        $this->assertEquals(
            array(
                'php.min'      => '5.5.0',
                'php.max'      => '',
                'php.all'      => '5.5.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#227
     *
     * @link https://github.com/llaville/php-compat-info/issues/227
     *       Does not detect Use traits
     * @group features
     * @return void
     */
    public function testFeatureGH227()
    {
        $dataSource = self::$fixtures . self::GH227;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];
        $this->assertEquals(
            array(
                'php.min'      => '5.4.0',
                'php.max'      => '',
                'php.all'      => '5.4.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#228
     *
     * @link https://github.com/llaville/php-compat-info/issues/228
     *       `const FOO = null;` does not require PHP 5.6.0
     * @group features
     * @return void
     */
    public function testFeatureGH228()
    {
        $dataSource = self::$fixtures . self::GH228;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];
        $this->assertEquals(
            array(
                'php.min'      => '5.3.0',
                'php.max'      => '',
                'php.all'      => '5.3.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#229
     *
     * @link https://github.com/llaville/php-compat-info/issues/229
     *       $this in closures not properly detected
     * @group features
     * @return void
     */
    public function testFeatureGH229()
    {
        $dataSource = self::$fixtures . self::GH229;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];
        $this->assertEquals(
            array(
                'php.min'      => '5.4.0',
                'php.max'      => '',
                'php.all'      => '5.4.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#231
     *
     * @link https://github.com/llaville/php-compat-info/issues/231
     *       Closures that work in PHP 5.3 are reported as requiring 5.4
     * @group features
     * @return void
     */
    public function testFeatureGH231()
    {
        $dataSource = self::$fixtures . self::GH231;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];
        $this->assertEquals(
            array(
                'php.min'      => '5.3.0',
                'php.max'      => '',
                'php.all'      => '5.3.0',
            ),
            $versions
        );
    }

    /**
     * Regression test for feature GH#238
     *
     * @link https://github.com/llaville/php-compat-info/issues/238
     *       empty( self::$x ) reports 5.5.0
     * @group features
     * @return void
     */
    public function testFeatureGH238()
    {
        $dataSource = self::$fixtures . self::GH238;
        $analysers  = array('compatibility');
        $metrics    = self::$api->run($dataSource, $analysers);
        $versions   = $metrics[self::$analyserId]['versions'];

        $this->assertEquals(
            array(
                'php.min'      => '5.0.0',
                'php.max'      => '',
                'php.all'      => '5.0.0',
            ),
            $versions
        );
    }
}
