<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Enums\Width;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Filament\Widgets\AccountWidget;
use App\Filament\Intern\Pages\Profile;
use Filament\Widgets\FilamentInfoWidget;
use App\Http\Middleware\CheckInternRating;
use Filament\Http\Middleware\Authenticate;
use Filament\Support\Facades\FilamentView;
use Filament\FontProviders\GoogleFontProvider;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Awcodes\LightSwitch\LightSwitchPlugin;
use Awcodes\LightSwitch\Enums\Alignment;
use Filament\Facades\Filament as FilamentFacade;

class InternPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->spa()
            ->default()
            ->id('intern')
            ->path('intern')
            ->login()
            ->profile(Profile::class)
            ->resourceCreatePageRedirect('index')
            ->resourceEditPageRedirect('index')
            ->colors([
                'primary' => Color::Rose,
            ])
            ->font('Poppins', provider: GoogleFontProvider::class)
            ->brandName('InternFolio')
            ->brandLogo(asset('image/logo.png'))
            ->brandLogoHeight('5rem')
            ->favicon(asset('image/logo.png'))
            ->maxContentWidth(Width::Full)
            ->simplePageMaxContentWidth(Width::Small)
            ->unsavedChangesAlerts()
            ->topNavigation()
            ->viteTheme('resources/css/filament/intern/theme.css')
            ->discoverResources(in: app_path('Filament/Intern/Resources'), for: 'App\Filament\Intern\Resources')
            ->discoverPages(in: app_path('Filament/Intern/Pages'), for: 'App\Filament\Intern\Pages')
            ->pages([
                // Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Intern/Widgets'), for: 'App\Filament\Intern\Widgets')
            ->widgets([
                AccountWidget::class,
            ])
            ->plugins([
                LightSwitchPlugin::make()
                    ->position(Alignment::TopCenter),
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                CheckInternRating::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }

    public function boot(): void
    {
        FilamentView::registerRenderHook(
            PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE,
            fn() => view('filament.intern.pages.auth.login-back-home')
        );

        FilamentView::registerRenderHook(
            PanelsRenderHook::USER_MENU_BEFORE,
            function () {
                $user = auth()->user();
                $currentPanel = FilamentFacade::getCurrentPanel()?->getId();

                // Pastikan user login, berada di panel 'intern', dan is_admin adalah 0
                if ($user && $currentPanel === 'intern' && $user->is_admin == 0) {
                    return view('filament.intern.components.navbar-export-cv');
                }

                return '';
            }
        );
    }
}
