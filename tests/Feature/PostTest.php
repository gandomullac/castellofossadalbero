<?php

use App\Filament\Resources\PostResource\Pages\ListPosts;
use App\Models\Post;

use function Pest\Livewire\livewire;

describe('Posts can be handled', function () {

    test('Posts can be created', function () {
        $n = 10;
        Post::factory()->count($n)->create();
        
        expect(Post::count())->toBe($n);
    });

    test('A post can be retrieved', function() {
        $post = Post::factory()->create();
        $retrieved = Post::find($post->id);

        expect($retrieved->id)->toBe($post->id);
        expect($retrieved->title)->toBe($post->title);
    });
        
    test('All posts can be retrieved', function() {
        $n = 10;
        Post::factory()->count($n)->create();
        $posts = Post::all();

        expect(count($posts))->toBe($n);
    });
        
    test('A post can be updated', function() {
        $post = Post::factory()->create(['title' => 'Original title']);
        $post->title = 'Updated title'; $post->save();
        
        expect($post->fresh()->title)->toBe('Updated title');
    });
        
    test('A post can be deleted', function() {
        $post = Post::factory()->create();
        $post->delete();
        
        expect(Post::find($post->id))->toBeNull();
    });

});