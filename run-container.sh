#!/bin/sh

docker run -w /root -v "$PWD":/root -it vitalex/design-patterns-strategy:latest /bin/sh
