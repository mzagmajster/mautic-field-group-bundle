#!/bin/bash

mkdir -p .git/hooks
cp .githooks/pre-commit .git/hooks
chmod 755 .git/hooks/pre-commit
