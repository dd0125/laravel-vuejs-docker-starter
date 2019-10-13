FROM nginx:1.17

# 地域言語設定
ENV LANG ja_JP.UTF-8
ENV LANGUAGE ja_JP:ja
## ENV LC_ALL ja_JP
ENV TZ JST-9
#
## 特定のパッケージインストール時に地域を聞かれないようにする
ENV DEBIAN_FRONTEND=noninteractive
#
## apt の更新
RUN apt -y update
# RUN apt -y upgrade
