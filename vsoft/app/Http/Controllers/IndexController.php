<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Course;
class IndexController extends Controller
{
        
    public function index() {
        //Get data from DB in here and pass it to the view
        $courses = Course::with('lecturers','location','organization')->orderBy('created_at')->get();
       
        // return view('index.index', [
        // //     'title'=>'location',
        // //     'lecturers'=>$courses,
        // // ]);
        return view('index.index', [          
            'title' => 'Welcome to VSoft',
            'courses'=>$courses,
            'text' => '<p>Lorem ipsum dolor sit accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Magna et cursus lorem faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod tempus. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida lorem ipsum dolor sit amet dolor feugiat consequat. </p>
            <p>Lorem ipsum dolor sit accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Magna et cursus lorem faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod tempus. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida lorem ipsum dolor sit amet dolor feugiat consequat. </p>
            <hr />
            <h3>Magna odio tempus commodo</h3>
            <p>In arcu accumsan arcu adipiscing accumsan orci ac. Felis id enim aliquet. Accumsan ac integer lobortis commodo ornare aliquet accumsan erat tempus amet porttitor. Ante commodo blandit adipiscing integer semper orci eget. Faucibus commodo adipiscing mi eu nullam accumsan morbi arcu ornare odio mi adipiscing nascetur lacus ac interdum morbi accumsan vis mi accumsan ac praesent.</p>
            <p>Felis sagittis eget tempus primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Magna sed etiam ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus lorem ipsum dolor sit amet nullam.</p>'
        ]);
    }
    public function search(Request $request) {
        $searchQuery = $request->get('searchTextInput');
        $searchCriteria = $request->get('searchOption');
        if($searchCriteria == 'organization_id') {
            $searchResult = Course::with('location', 'organization','lecturers')->whereHas('organization',
                function ($query) use ($searchQuery){
                $query->where('Name', 'LIKE', '%'.$searchQuery.'%');
            })->get();
        }
        elseif($searchCriteria == 'location_id') {
            $searchResult = Course::with('location', 'organization','lecturers')->whereHas('location',
                function ($query) use ($searchQuery){
                    $query->where('name', 'LIKE', '%'.$searchQuery.'%');
                })->get();
        }
        elseif($searchCriteria=="lecturers"){
            $searchResult = Course::with('location','organization','lecturers')->whereHas('lecturers',
                function ($query) use ($searchQuery){
                    $query->where('FirstName','LIKE','%'.$searchQuery.'%');
                })->get();
        }
        else {
            $searchResult = Course::with('location', 'organization','lecturers')->where
            ($searchCriteria, 'LIKE', '%'.$searchQuery.'%')->get();
        }     
        return view('index.search', [
            'courses' => $searchResult
        ]);
    }
}
