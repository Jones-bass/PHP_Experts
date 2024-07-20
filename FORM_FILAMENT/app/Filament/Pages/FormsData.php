<?php

namespace App\Filament\Pages;

use App\Forms\Components\CustomPlaceholder;
use Filament\Pages\Page;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\View;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;

use Filament\Forms\Form;

class FormsData extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.forms-data';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Dados Gerais')
                    ->schema([
                        CustomPlaceholder::make('title')
                            ->label('Perfil do ' . auth()->user()->name)
                            ->content('Confira os seus dados e altere caso necessário.'),

                        View::make('hr')
                            ->view('forms.components.hr'),

                        Group::make([
                            Placeholder::make('name')
                                ->label('Nome')
                                ->columnSpan(1),
                            TextInput::make('name')
                                ->required()
                                ->hiddenLabel()
                                ->columnSpan(5),
                        ])->columns(6),

                        Group::make([
                            Placeholder::make('email')
                                ->label('Email')
                                ->columnSpan(1),
                            TextInput::make('email')
                                ->email()
                                ->required()
                                ->hiddenLabel()
                                ->columnSpan(5),
                        ])->columns(6),

                        Group::make([
                            Placeholder::make('whatsapp')
                                ->label('WhatsApp')
                                ->columnSpan(1),
                            TextInput::make('whatsapp')
                                ->mask('(99) 99999-9999')
                                ->hiddenLabel()
                                ->required()
                                ->columnSpan(5),
                        ])->columns(6),

                        View::make('hr')
                            ->view('forms.components.hr'),

                        CustomPlaceholder::make('title')
                            ->label('Localização')
                            ->content('Escolha seu idioma e formato de data.'),

                        Group::make([
                            Placeholder::make('Idioma')
                                ->label('Idioma')
                                ->columnSpan(1),
                            Select::make('settings.language')
                                ->required()
                                ->searchable()
                                ->hiddenLabel()
                                ->columnSpan(5),
                        ])->columns(6),

                        Group::make([
                            Placeholder::make('Formato da data')
                                ->label('Formato da data')
                                ->columnSpan(1),
                            Select::make('settings.date_format')
                                ->required()
                                ->searchable()
                                ->hiddenLabel()
                                ->columnSpan(5),
                        ])->columns(6),

                        View::make('hr')
                            ->view('forms.components.hr'),


                    ])
                    ->statePath('data'),
            ]);
    }

    public function create(): void
    {
        dd($this->form->getState());
    }
}
