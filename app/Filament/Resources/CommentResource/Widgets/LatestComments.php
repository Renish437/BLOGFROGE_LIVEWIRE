<?php

namespace App\Filament\Resources\CommentResource\Widgets;

use App\Filament\Resources\CommentResource;
use App\Models\Comment;
use Filament\Actions\Action;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestComments extends BaseWidget
{
    protected static ?string $heading = 'Latest Comments';

      protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Comment::whereDate('created_at', '>=', now()->subDays(14)->startOfDay())
            )
            ->columns([
              TextColumn::make('user.name'),
              TextColumn::make('post.title'),
              TextColumn::make('comment'),
              TextColumn::make('created_at')->dateTime()->sortable(),
            ])->filters([

            ])
            ->actions([
              Tables\Actions\Action::make('View')
                ->icon('heroicon-s-eye')
                ->url(fn(Comment $record):string => CommentResource::getUrl('edit', ['record' => $record]))
                ->openUrlInNewTab(), 
            ]);
    }
}
