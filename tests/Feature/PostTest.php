<?php

use App\Models\Post;

const POST_COUNT = 1;

describe('Posts can be handled', function () {

    afterEach(function () {
        Post::all()->each(fn ($post) => $post->delete());
    });

    test('Posts can be created', function () {
        Post::factory()->count(POST_COUNT)->create();

        expect(Post::count())->toBe(POST_COUNT);
    });

    test('A post can be retrieved', function () {
        $post = Post::factory()->create();
        $retrieved = Post::find($post->id);

        expect($retrieved->id)->toBe($post->id);
        expect($retrieved->title)->toBe($post->title);
    });

    test('All posts can be retrieved', function () {
        Post::factory()->count(POST_COUNT)->create();
        $posts = Post::all();

        expect(count($posts))->toBe(POST_COUNT);
    });

    test('A post can be updated', function () {
        $post = Post::factory()->create();
        $post->update(['title' => 'Updated title']);

        expect($post->fresh()->title)->toBe('Updated title');
    });

    test('A post can be deleted', function () {
        $post = Post::factory()->create();
        $post->delete();

        expect(Post::find($post->id))->toBeNull();
    });

    test("A post's image can be deleted from disk", function () {
        $post = Post::factory()->create();
        $postImage = $post->image;
        $post->delete();

        expect(file_exists(public_path($postImage)))->toBeFalse();
    });

});
