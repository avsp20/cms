<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;

class Pages extends Component
{
	public $pages, $page_id, $parent_id, $slug, $title, $content, $is_create = false, $is_edit = false, $edit_page, $all_pages;

    public function render()
    {
    	$this->pages = Page::with('children')->get();
        return view('livewire.pages');
    }

    public function create()
    {
        $this->createPage();
        $this->openCreatePageModal();
    }

    private function createPage(){
        $this->parent_id = '';
        $this->slug = '';
        $this->title = '';
        $this->content = '';
    }

    public function openCreatePageModal()
    {
    	$this->pages = Page::get();
        $this->is_create = true;
    }

    public function closeCreatePageModal()
    {
        $this->is_create = false;
    }

    public function openEditPageModal()
    {
    	$this->pages = Page::get();
        $this->is_edit = true;
    }

    public function closeEditPageModal()
    {
        $this->is_edit = false;
    }

    public function store(){
        // Validation
        $this->validate([
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:pages,slug,NULL,id,deleted_at,NULL',
            'content' => 'required',
        ]);

        try{
            // Create Pages
            Page::create([
                'slug' => $this->slug,
	            'parent_id' => ($this->parent_id != null) ? $this->parent_id : null,
	            'title' => $this->title,
	            'content' => $this->content,
            ]);
            return redirect()->to('/')->with('success','Page Created Successfully!!');
            $this->createPage();
            $this->closeCreatePageModal();
        }catch(\Exception $e){
            return redirect()->to('/')->with('error','Something goes wrong while updating category!!');
            $this->openCreatePageModal();
        }
    }

    public function edit($id)
    {
        $all_pages = Page::get();
        $this->edit_page = Page::findOrFail($id);
        $this->page_id = $id;
        $this->slug = $page->slug;
        $this->parent_id = $page->parent_id;
        $this->title = $page->title;
        $this->content = $page->content;
        $this->is_edit = true;
        // $this->emit('openEditPageModal');
    }

    public function update(){
        // Validation
        $this->validate([
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:pages,slug,' .$this->page_id. ',id,deleted_at,NULL',
            'content' => 'required',
        ]);
        try{
            // Update Pages
            Page::find($this->page_id)->fill([
                'slug' => $this->slug,
	            'parent_id' => ($this->parent_id != null) ? $this->parent_id : null,
	            'title' => $this->title,
	            'content' => $this->content,
            ])->save();
            return redirect()->to('/')->with('success','Page Updated Successfully!!');
            $this->closeEditPageModal();

        }catch(\Exception $e){
        	return redirect()->to('/')->with('error','Something goes wrong while updating category!!');
            $this->openEditPageModal();
        }
    }

    public function delete($id)
    {
        Page::find($id)->delete();
        session()->flash('message', 'Page deleted successfully.');
    }

    public function setTitleAttribute($value)
	{
	    $this->attributes['title'] = $value;
	    $this->attributes['slug'] = str_slug($value);
	}

	public function showPages($page=null, $sub_page=null, $sub_sub_page=null)
	{
		if($page){
			$page = Page::where('slug',$page)->first();
		}
		if($sub_page){
			$page = Page::where('slug',$sub_page)->first();	
		}
		if($sub_sub_page){
			$page = Page::where('slug',$sub_sub_page)->first();		
		}
		if(empty($page)){
			return redirect()->to('/')->with('message', 'Page Not Found.');
		}
		return view('livewire.view', ['page' => $page]);
	}
}
