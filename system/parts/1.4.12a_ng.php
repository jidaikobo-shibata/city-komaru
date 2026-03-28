<?php

/* 動画見出しを装飾優先の固定サイズにし、文字間隔を広げると見出しの下部が切れる */ ?>
<style>
#movie-title {
    max-width: 37rem; width: calc(100% - 2rem);
    height: 4em;
    margin: 2.5rem auto 1.5rem;
    padding: 0.7rem 1rem;
    text-align: center;
    line-height: 1.5;
    overflow: hidden;
    background: linear-gradient(90deg, #d9f0dd 0%, #eef7f0 100%);
    border: 1px solid #7bb089;
    border-radius: 999px;
    box-sizing: border-box;
}
</style>
