<?php

namespace App\Filament\Pages;

use App\Forms\Components\CustomPlaceholder;
use Filament\Pages\Page;
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
                        Placeholder::make('title')
                            ->label('Perfil do ' . auth()->user()->name)
                            ->content('Confira os seus dados e altere caso necessário.'),

                        Group::make([
                            Placeholder::make('name')
                                ->label('Nome')
                                ->columnSpan(1),
                            TextInput::make('name')
                                ->required()
                                ->hiddenLabel()
                                ->columnSpan(5),
                        ])->columns(6),
                    ])
                    ->statePath('data'),
            ]);
    }

    public function create(): void
    {
        dd($this->form->getState());
    }
}
