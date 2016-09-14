#!/bin/sh

#qunaud-main_WOL_post_tweet

date=$(date)
msg="qunaud-main POST_"
post=$msg$date
ttytter -ssl -status="${post}" >/dev/null
