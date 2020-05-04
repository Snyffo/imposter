<?php


namespace TypistTech\Imposter;


class FilesystemFilter implements FilesystemFilterInterface {

	/**
	 * @inheritDoc
	 */
	public function isFileIncluded($target){
		return preg_match('/\.php$/', $target) === 1;
	}

	/**
	 * @inheritDoc
	 */
	public function isDirectoryInclude($target){
		return preg_match('/^[\._](svn|CVS|arch-params|monotone|bzr|git|hg)|CVS|_darcs$/', $target) === 0;
	}
}