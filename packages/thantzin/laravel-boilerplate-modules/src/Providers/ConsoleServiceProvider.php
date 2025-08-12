<?php

namespace Thantzin\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use Thantzin\Modules\Commands\CommandMakeCommand;
use Thantzin\Modules\Commands\ControllerMakeCommand;
use Thantzin\Modules\Commands\DisableCommand;
use Thantzin\Modules\Commands\DumpCommand;
use Thantzin\Modules\Commands\EnableCommand;
use Thantzin\Modules\Commands\EventMakeCommand;
use Thantzin\Modules\Commands\FactoryMakeCommand;
use Thantzin\Modules\Commands\InstallCommand;
use Thantzin\Modules\Commands\JobMakeCommand;
use Thantzin\Modules\Commands\ListCommand;
use Thantzin\Modules\Commands\ListenerMakeCommand;
use Thantzin\Modules\Commands\MailMakeCommand;
use Thantzin\Modules\Commands\MiddlewareMakeCommand;
use Thantzin\Modules\Commands\MigrateCommand;
use Thantzin\Modules\Commands\MigrateRefreshCommand;
use Thantzin\Modules\Commands\MigrateResetCommand;
use Thantzin\Modules\Commands\MigrateRollbackCommand;
use Thantzin\Modules\Commands\MigrateStatusCommand;
use Thantzin\Modules\Commands\MigrationMakeCommand;
use Thantzin\Modules\Commands\ModelMakeCommand;
use Thantzin\Modules\Commands\ModuleMakeCommand;
use Thantzin\Modules\Commands\NotificationMakeCommand;
use Thantzin\Modules\Commands\PolicyMakeCommand;
use Thantzin\Modules\Commands\ProviderMakeCommand;
use Thantzin\Modules\Commands\PublishCommand;
use Thantzin\Modules\Commands\PublishConfigurationCommand;
use Thantzin\Modules\Commands\PublishMigrationCommand;
use Thantzin\Modules\Commands\PublishTranslationCommand;
use Thantzin\Modules\Commands\RequestMakeCommand;
use Thantzin\Modules\Commands\ResourceMakeCommand;
use Thantzin\Modules\Commands\RouteProviderMakeCommand;
use Thantzin\Modules\Commands\RuleMakeCommand;
use Thantzin\Modules\Commands\MakeRepositoryCommand;
use Thantzin\Modules\Commands\MakeBreadcrumbCommand;
use Thantzin\Modules\Commands\SeedCommand;
use Thantzin\Modules\Commands\SeedMakeCommand;
use Thantzin\Modules\Commands\SetupCommand;
use Thantzin\Modules\Commands\TestMakeCommand;
use Thantzin\Modules\Commands\UnUseCommand;
use Thantzin\Modules\Commands\UpdateCommand;
use Thantzin\Modules\Commands\UseCommand;

class ConsoleServiceProvider extends ServiceProvider
{
    protected $defer = false;

    /**
     * The available commands
     *
     * @var array
     */
    protected $commands = [
        CommandMakeCommand::class,
        ControllerMakeCommand::class,
        DisableCommand::class,
        DumpCommand::class,
        EnableCommand::class,
        EventMakeCommand::class,
        JobMakeCommand::class,
        ListenerMakeCommand::class,
        MailMakeCommand::class,
        MiddlewareMakeCommand::class,
        NotificationMakeCommand::class,
        ProviderMakeCommand::class,
        RouteProviderMakeCommand::class,
        InstallCommand::class,
        ListCommand::class,
        ModuleMakeCommand::class,
        FactoryMakeCommand::class,
        PolicyMakeCommand::class,
        RequestMakeCommand::class,
        RuleMakeCommand::class,
        MakeRepositoryCommand::class,
        MakeBreadcrumbCommand::class,
        MigrateCommand::class,
        MigrateRefreshCommand::class,
        MigrateResetCommand::class,
        MigrateRollbackCommand::class,
        MigrateStatusCommand::class,
        MigrationMakeCommand::class,
        ModelMakeCommand::class,
        PublishCommand::class,
        PublishConfigurationCommand::class,
        PublishMigrationCommand::class,
        PublishTranslationCommand::class,
        SeedCommand::class,
        SeedMakeCommand::class,
        SetupCommand::class,
        UnUseCommand::class,
        UpdateCommand::class,
        UseCommand::class,
        ResourceMakeCommand::class,
        TestMakeCommand::class,
    ];

    /**
     * Register the commands.
     */
    public function register()
    {
        $this->commands($this->commands);
    }

    /**
     * @return array
     */
    public function provides()
    {
        $provides = $this->commands;

        return $provides;
    }
}
