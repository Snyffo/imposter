<?php


namespace TypistTech\Imposter;


interface FilesystemFilterInterface {
	/**
	 * @param string $target
	 *
	 * @return bool
	 */
	public function isFileIncluded($target);
	/**
	 * @param string $target
	 *
	 * @return bool
	 */
	public function isDirectoryInclude($target);
}