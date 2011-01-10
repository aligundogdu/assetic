<?php

namespace Assetic\Filter;

use Assetic\Asset\AssetInterface;

/**
 * A filter that wraps callables.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class CallablesFilter implements FilterInterface
{
    private $loader;
    private $dumper;

    public function __construct($loader = null, $dumper = null)
    {
        $this->loader = $loader;
        $this->dumper = $dumper;
    }

    public function filterLoad(AssetInterface $asset)
    {
        if (null !== $callable = $this->loader) {
            $callable($asset);
        }
    }

    public function filterDump(AssetInterface $asset)
    {
        if (null !== $callable = $this->dumper) {
            $callable($asset);
        }
    }
}
