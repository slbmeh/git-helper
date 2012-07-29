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

namespace FancyGuy\Git\SubCommands;

/**
 * Git helper extension.
 *
 * @author Steve Buzonas <steve@slbmeh.com>
 */
class Config extends \FancyGuy\Git\SubCommand {
	protected $_requiresCleanTree = true;
	
	public function description() {
		return "configures the repository to use all functionality of git-helper";
	}
	
	public function main() {
		$master_branch = $this->cliPrompt('Input the name for the master branch', getDefaultBranch('master'));
		$release_branch = $this->cliPrompt('Input the name for the release branch', getDefaultBranch('release'));
		$hotfix_prefix = $this->cliPrompt('Input the prefix for hotfix branches', getDefaultBranch('hotfix'));
		setGitConfigValue('githelper.branch.master', $master_branch);
		setGitConfigValue('githelper.branch.release', $release_branch);
		setGitConfigValue('githelper.branch.hotfix', $hotfix_prefix);
	}
	
	public function show() {
		$this->cliPrintLn('Master branch: ' . getGitConfigValue('githelper.branch.master'));
		$this->cliPrintLn('Release branch: ' . getGitConfigValue('githelper.branch.release'));
		$this->cliPrintLn('Hotfix prefix: ' . getGitConfigValue('githelper.branch.hotfix'));
	}
}
