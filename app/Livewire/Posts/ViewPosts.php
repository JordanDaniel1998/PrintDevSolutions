<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class ViewPosts extends Component
{
    public $description;
    public $stars = 1;
    public $maxStart = 5;
    public $selectedCategory;
    public $postPerView;

    protected $rules = [
        'description' => 'required|string',
        'stars' => 'required|integer|between:1,5',
    ];

    public function setRating($rating)
    {
        $this->stars = $rating;
    }

    public function mount()
    {
        $this->selectedCategory = 1; // Valor por defecto
        $this->postPerView = 6; // Valor por defecto
    }

    public function showMorePost(){
        $this->postPerView = $this->postPerView + 4;
    }

    public function updatedSelectedCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
    }

    public function deletePost(Post $post){
        $type = $post->delete();

        $this->dispatch('deletePost', ['type' => $type]);
    }

    public function saveComment()
    {
        $data = $this->validate($this->rules);

        Post::create([
            'user_id' => auth()->user()->id,
            'comment' => $data['description'],
            'stars' => $this->stars,
        ]);
        $this->stars = 1;
        $this->description = "";

        // Disparamos un evento para la alerta
        $this->dispatch("addedPost");
    }

    // En el render se ejecutan los cambios de las variables que se actualizan
    public function render()
    {
        if ($this->selectedCategory == 1) {
            $posts = Post::latest()->limit($this->postPerView)->get();
        }

        if ($this->selectedCategory == 2) {
            $posts = Post::latest()->where('stars', 5)->limit($this->postPerView)->get();
        }

        if ($this->selectedCategory == 3) {
            $posts = Post::orderBy('comment', 'asc')->limit($this->postPerView)->get();
        }

        if ($this->selectedCategory == 4) {
            $posts =  Post::orderBy('comment', 'desc')->limit($this->postPerView)->get();
        }

        return view('livewire.posts.view-posts', compact('posts'));
    }
}
