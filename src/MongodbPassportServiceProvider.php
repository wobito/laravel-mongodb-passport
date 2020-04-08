<?php

namespace Wobito\Mongodb;

use Illuminate\Support\ServiceProvider;
use Wobito\Mongodb\Passport\AuthCode;
use Wobito\Mongodb\Passport\Client;
use Wobito\Mongodb\Passport\PersonalAccessClient;
use Wobito\Mongodb\Passport\Token;
use Wobito\Mongodb\Passport\RefreshToken;

class MongodbPassportServiceProvider extends ServiceProvider {
    public function register() {
        /*
         * Passport client extends Eloquent model by default, so we alias them.
         */
        if (class_exists('Illuminate\Foundation\AliasLoader')) {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Laravel\Passport\AuthCode', AuthCode::class);
            $loader->alias('Laravel\Passport\Client', Client::class);
            $loader->alias('Laravel\Passport\PersonalAccessClient', PersonalAccessClient::class);
            $loader->alias('Laravel\Passport\Token', Token::class);
            $loader->alias('Laravel\Passport\RefreshToken', RefreshToken::class);
        } else {
            class_alias('Laravel\Passport\AuthCode', AuthCode::class);
            class_alias('Laravel\Passport\Client', Client::class);
            class_alias('Laravel\Passport\PersonalAccessClient', PersonalAccessClient::class);
            class_alias('Laravel\Passport\Token', Token::class);
            class_alias('Laravel\Passport\RefreshToken', RefreshToken::class);
        }
    }
}
