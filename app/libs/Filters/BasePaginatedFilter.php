<?php

namespace Tiplap\Filters;

/**
 * Abstract filter for paginating result
 *
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
abstract class BasePaginatedFilter implements IFilter
{
	/** @var int */
	private $offset;
	/** @var int */
	private $limit;

	/**
	 * FilesFilter constructor.
	 * @param $offset
	 * @param $limit
	 */
	public function __construct($offset, $limit)
	{
		$this->offset = $offset;
		$this->limit = $limit;
	}

	/**
	 * @return int
	 */
	public function getOffset()
	{
		return $this->offset;
	}

	/**
	 * @param int $offset
	 * @return BasePaginatedFilter
	 */
	public function setOffset($offset)
	{
		$this->offset = (int) $offset;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getLimit()
	{
		return $this->limit;
	}

	/**
	 * @param int $limit
	 * @return BasePaginatedFilter
	 */
	public function setLimit($limit)
	{
		$this->limit = (int) $limit;
		return $this;
	}


}