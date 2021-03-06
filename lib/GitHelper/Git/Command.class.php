<?php

/*
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 * 
 *    Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 * 
 *    Redistributions in binary form must reproduce the above copyright notice,
 *    this list of conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 * 
 *    Neither the name of FancyGuy Technologies nor the names of its
 *    contributors may be used to endorse or promote products derived from this
 *    software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 * 
 * Copyright © 2012, FancyGuy Technologies
 * All rights reserved.
 */

namespace GitHelper\Git;

/**
 * Description of Command
 *
 * @author Steve Buzonas <steve@slbmeh.com>
 */
abstract class Command {
	protected $_usage;
	protected $_helper;
	
	/**
	 * Returns the git-helper instance created by the cli
	 * @return \GitHelper\Git\Helper
	 */
	public function getHelper() {
		return $this->_helper;
	}
	
	/**
	 * Prints out the usage message.
	 */
	public function usage() {
		$this->cliPrintLn($this->_usage);
	}
	
	/**
	 * Prints a message with a trailing newline character.
	 * @param string $line
	 */
	public static function cliPrintLn($line) {
		fwrite(STDOUT, $line . PHP_EOL);
	}
	
	public static function cliPrompt($message, $default = null) {
		$line = (!empty($default)) ? $message . ': [' . $default . '] ' : $message . ': ';
		fwrite(STDOUT, $line);
		$input_val = rtrim(fgets(STDIN), PHP_EOL); // strip off the EOL character.
		$return_val = (!empty($input_val)) ? $input_val : $default;
		return $return_val;
	}
}
