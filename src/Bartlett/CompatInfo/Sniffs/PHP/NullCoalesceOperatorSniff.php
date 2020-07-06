<?php declare(strict_types=1);

namespace Bartlett\CompatInfo\Sniffs\PHP;

use Bartlett\Reflect\Sniffer\SniffAbstract;

use PhpParser\Node;

/**
 * Null Coalesce Operator introduced since PHP 7.0.0 alpha1
 *
 * @link https://wiki.php.net/rfc/isset_ternary
 */
class NullCoalesceOperatorSniff extends SniffAbstract
{
    private $nullCoalesceOperator;

    public function enterSniff(): void
    {
        parent::enterSniff();

        $this->nullCoalesceOperator = array();
    }

    public function leaveSniff(): void
    {
        parent::leaveSniff();

        if (!empty($this->nullCoalesceOperator)) {
            // inform analyser that few sniffs were found
            $this->visitor->setMetrics(
                array(Metrics::NULL_COALESCE_OPERATOR => $this->nullCoalesceOperator)
            );
        }
    }

    /**
     * @param Node $node
     * @return void
     */
    public function enterNode(Node $node): void
    {
        parent::enterNode($node);

        if ($node instanceof Node\Expr\BinaryOp\Coalesce) {
            $name = '#';

            if (empty($this->nullCoalesceOperator)) {
                $version = '7.0.0alpha1';

                $this->nullCoalesceOperator[$name] = array(
                    'severity' => $this->getCurrentSeverity($version),
                    'version'  => $version,
                    'spots'    => array()
                );
            }

            $this->nullCoalesceOperator[$name]['spots'][] = $this->getCurrentSpot($node);
        }
    }
}
