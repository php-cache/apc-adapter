<?php

/*
 * This file is part of php-cache\apc-adapter package.
 *
 * (c) 2015-2015 Aaron Scherer <aequasi@gmail.com>, Tobias Nyholm <tobias.nyholm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Cache\Adapter\Apc;

use Cache\Adapter\Common\AbstractCachePool;
use Psr\Cache\CacheItemInterface;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class ApcCachePool extends AbstractCachePool
{
    protected function fetchObjectFromCache($key)
    {
        return apc_fetch($key);
    }

    protected function clearAllObjectsFromCache()
    {
        return apc_clear_cache(apc_clear_cache('user'));
    }

    protected function clearOneObjectFromCache($key)
    {
        return apc_delete($key);
    }

    protected function storeItemInCache($key, CacheItemInterface $item, $ttl)
    {
        return apc_store($key, $item, $ttl);
    }
}
