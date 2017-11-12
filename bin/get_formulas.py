#!/usr/bin/python3

# For description and usage, see the argparse options at the end of the file

import argparse
import os
import sys
import yaml


def clone_or_pull(DEST, SYMLINK=False):
    def use_git_to_clone_or_pull_repo():
        # pygit2 is not available for python3 in Leap, use plain git instead

        import subprocess

        if not os.path.exists(DEST):
            os.mkdir(DEST)
        if os.path.isdir(FULL_PATH):
            subprocess.Popen(['git', 'pull'], stdout=subprocess.PIPE, stderr=subprocess.PIPE)
        else:
            subprocess.Popen(['git', 'clone', url, FULL_PATH], stdout=subprocess.PIPE, stderr=subprocess.PIPE)

    def use_pygit2_to_clone_or_pull_repo():
        import pygit2

        if os.path.isdir(FULL_PATH):
            repo = pygit2.Repository(FULL_PATH)
            repo.checkout('HEAD')
        else:
            pygit2.clone_repository(url, FULL_PATH, bare=False)

    for formula, data in FORMULAS.items():
        namespace = data.get('namespace', 'saltstack-formulas')
        prefix = data.get('prefix', '')
        url = 'https://github.com/%s/%s%s-formula' % (namespace, prefix, formula)
        FULL_PATH = '%s/%s-formula' % (DEST, formula)
        use_git_to_clone_or_pull_repo()
        if SYMLINK:
            os.symlink('%s/%s' % (FULL_PATH, formula), '/srv/salt/%s' % formula)


with open('FORMULAS.yaml', 'r') as f:
    FORMULAS = yaml.load(f)

parser = argparse.ArgumentParser(description='Loads the formulas from FORMULAS.yaml and optionally clones them in a specified destination. Optionally it can also create a symlink from the cloned path to /srv/salt, useful for the CI worker.')
parser.add_argument('-c', '--clone', action='store_true', help='Clone the formulas to the destination specified with "--destination". If the repository is already cloned, then it will be pulled/fetched.')
parser.add_argument('-s', '--symlink', action='store_true', help='Creates symlink from the specified destination to /srv/salt.')
requiredArgs = parser.add_argument_group('required arguments')
requiredArgs.add_argument('-d', '--destination', nargs=1, required=True, help='Destination absolute path of the cloned (or to-be-cloned) repositories of the formulas.')
args = parser.parse_args()

if not os.path.isabs(args.destination[0]):
    parser.print_help()
    sys.exit(1)

if args.clone:
    clone_or_pull(args.destination[0], args.symlink)
