<?php

/*
 * License: MIT
 *    Time: 2017-01-20 11:18:55
 *    Name: Wingy.php
 *    Note: CloudGate Wingy Basic Rule
 *  Author: Eval,BurpSuite
 */

# 触发下载
header('Content-Disposition: attachment; filename='.'Wingy.Conf');

# ClouGate控制器
require_once "../Controller/Controller.php";

# Cloud配置信息
echo "#  \r\n";
echo "# Wingy Config File [CloudGate]\r\n";
echo "# Download Time: " . date("Y-m-d H:i:s") . "\r\n";
echo "# \r\n";
echo "version: 2\r\n";
echo "adapter:\r\n";
echo "  - id: PROXY\r\n";
echo "    type: ss\r\n";
echo "    method: AES-256-CFB\r\n";
echo "    host: 127.0.0.1\r\n";
echo "    port: 80\r\n";
echo "    password: Password\r\n";
echo "  - id: speed\r\n";
echo "    type: SPEED\r\n";
echo "    adapters:\r\n";
echo "      - id: direct\r\n";
echo "        delay: 0\r\n";
echo "      - id: PROXY\r\n";
echo "        delay: 500\r\n";
echo "  - id: reject\r\n";
echo "    type: reject\r\n";
echo "    delay: 300\r\n";
echo "rule:\r\n";
echo "  - type: list\r\n";
echo "    adapter: direct\r\n";
echo "    criteria:\r\n";
echo "      # Default\r\n".Replace(CURL(true,$RuleList['Default']).$CURLContent,false,false,false,false,true,false).$Wingy_Default."\r\n";
echo "  - type: list\r\n";
echo "    adapter: PROXY\r\n";
echo "    criteria:\r\n";
echo "      # PROXY\r\n".Replace(CURL(true,$RuleList['Advanced']).$CURLContent,false,false,false,false,true,false).$Wingy_Advanced;
echo "  - type: list\r\n";
echo "    adapter: reject\r\n";
echo "    criteria:\r\n";
echo "      # REJECT\r\n".Replace(CURL(true,$RuleList['REJECT']).$CURLContent,false,false,false,false,true,false).$Wingy_REJECT;
echo "  - type: list\r\n";
echo "    adapter: direct\r\n";
echo "    criteria:\r\n";
echo "      # KEYWORD-DIRECT\r\n".Replace(CURL(true,$RuleList['KEYWORD']).$CURLContent,false,false,false,false,true,false).$Wingy_KEYWORD_DIRECT;
echo "  - type: list\r\n";
echo "    adapter: PROXY\r\n";
echo "    criteria:\r\n";
echo "      # KEYWORD-PROXY\r\n".Replace(CURL(true,$RuleList['KEYWORD']).$CURLContent,false,false,false,false,true,false).$Wingy_KEYWORD_Proxy;
echo "  - type: list\r\n";
echo "    adapter: reject\r\n";
echo "    criteria:\r\n";
echo "      # KEYWORD-REJECT\r\n".Replace(CURL(true,$RuleList['KEYWORD']).$CURLContent,false,false,false,false,true,false).$Wingy_KEYWORD_REJECT;
echo "  - type: iplist\r\n";
echo "    adapter: direct\r\n";
echo "    criteria:\r\n";
echo "      # IPCIDR-DIRECT\r\n".Replace(CURL(true,$RuleList['IPCIDR']).$CURLContent,false,false,false,false,true,false).$Wingy_IPCIDR_DIRECT;
echo "  - type: iplist\r\n";
echo "    adapter: PROXY\r\n";
echo "    criteria:\r\n";
echo "      # IPCIDR-PROXY\r\n".Replace(CURL(true,$RuleList['IPCIDR']).$CURLContent,false,false,false,false,true,false).$Wingy_IPCIDR_Proxy;
echo "  - type: iplist\r\n";
echo "    adapter: reject\r\n";
echo "    criteria:\r\n";
echo "      # IPCIDR-REJECT\r\n".Replace(CURL(true,$RuleList['IPCIDR']).$CURLContent,false,false,false,false,true,false).$Wingy_IPCIDR_REJECT;
echo "      # Other\r\n";
echo "  - type: DNSFail\r\n";
echo "    adapter: PROXY\r\n";
echo "  - type: country\r\n";
echo "    country: CN\r\n";
echo "    match: true\r\n";
echo "    adapter: direct\r\n";
echo "  - type: country\r\n";
echo "    country: --\r\n";
echo "    match: true\r\n";
echo "    adapter: speed\r\n";
echo "  - type: all\r\n";
echo "    adapter: PROXY\r\n";

?>