#!/usr/bin/env bash

if ! [ -x "$(command -v i18next-conv)" ]; then
  echo 'Error: i18next-conv is not installed.' >&2
  echo 'Run `npm install i18next-conv -g` and run the script again'
  exit 1
fi

php converter.php
locales=(en de es fr nl pt)
suffixes=(US DE ES FR NL PT)
for index in ${!locales[*]}
do
  locale=${locales[$index]}
  suffix=${suffixes[$index]}
  i18next-conv --ctxSeparator ! -k . -l $locale -s converted/$locale.json -t ../languages/wsbintegration-${locale}_$suffix.po
  i18next-conv --ctxSeparator ! -k . -l $locale -s converted/$locale.json -t ../languages/wsbintegration-${locale}_$suffix.mo
done
