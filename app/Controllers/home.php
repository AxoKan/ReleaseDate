<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Lelang;

class home extends BaseController
{
    public function dashboard1()
    {
        // Start the session
        $user_id = session()->get('id_user');
    
        // Initialize the model
        $model = new M_lelang();
    
        // Fetch all logos and filter for a specific condition
        $logoData = $model->tampil('logo'); // Fetch all logos
        $filteredLogo = array_filter($logoData, function ($item) {
            return $item->id_logo == 1; // Adjust this condition as needed
        });
    
        // Set filtered logo data
        $data['satu'] = reset($filteredLogo);
    
        // Fetch specific logo data based on conditions
        $whereLogo = array('id_logo' => 1); // Change '1' to dynamic if needed
        $data['sa'] = $model->getWhere('logo', $whereLogo);
    
        // Fetch user data for the current session user
        $whereUser = array('id_user' => $user_id);
        $data['user'] = $model->getWhere('user', $whereUser);
        $model->logActivity($user_id, 'Login', 'User Has Log in.');
        // Fetch all game data
        $data['game'] = $model->Join('game', 'genre','game.genre = genre.id_genre');
        $data['genre'] = $model->tampil('genre');
    
        // Load views with the data
        echo view('header', $data);
        echo view('menu1', $data);
        echo view('dashboard1', $data);
        echo view('footer');
    }
    
	public function Login()
	{
        $model= new M_lelang();
        $logoData = $model->tampil('logo'); // Fetch all logos
        $filteredLogo = array_filter($logoData, function($item) {
            return $item->id_logo == 1; // Adjust this condition as needed
        });
        $data['satu'] = reset($filteredLogo);

    echo view('Login', $data);
	}
	public function aksi_login() {
        $user_id = session()->get('id_user');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
        $backupCaptcha = $this->request->getPost('backup_captcha');
    
        // Check if the server is online
       
        $model = new M_lelang();
            $where = array(
                'user' => $username,
                'password' => $password
            );
        
            $cek = $model->getWhere('user', $where);
        if ($cek > 0) {
                    session()->set('user', $cek->username);
                    session()->set('id_user', $cek->id_user);
                    session()->set('Level', $cek->Level);
                    // Redirect based on the Level
            if ($cek->Level == 'admin') {
                return redirect()->to('dashboard'); // Admin dashboard
            } elseif ($cek->Level == 'user') {
                return redirect()->to('dashboard1'); // User dashboard
                } else {
                    return redirect()->to('login');
                }
    }
}
	public function setting()
           {
            $userLevel = session()->get('Level');
            $allowedLevels = ['admin'];
            $user_id = session()->get('id_user');
            if (in_array($userLevel, $allowedLevels)) {
               $model = new M_lelang();

               $logoData = $model->tampil('logo'); // Fetch all logos
               $filteredLogo = array_filter($logoData, function($item) {
                   return $item->id_logo == 1; // Adjust this condition as needed
               });
               $data['satu'] = reset($filteredLogo);
               $where = array('id_logo' => $id);
               $data['sa'] = $model->getwhere('logo', $where);
               $where=array('id_user'=>session()->get('id_user'));
        $data['user']=$model->getWhere('user', $where);

        $model->logActivity($user_id, 'View', 'User view Setting.');
               echo view('header', $data);
               echo view('menu', $data);
               echo view('setting', $data);
               echo view('footer');
            } else {
                return redirect()->to('notfound');
            }
           }
           public function aksi_setting()
           {
               $model = new M_lelang();
               $user_id = session()->get('id_user');
               $a = $this->request->getPost('nama');
               $icon = $this->request->getFile('image2');
               $dash = $this->request->getFile('image');

           
               // Debugging: Log received data
               log_message('debug', 'Website Name: ' . $a);
               log_message('debug', 'Tab Icon: ' . ($icon ? $icon->getName() : 'None'));
               log_message('debug', 'Dashboard Icon: ' . ($dash ? $dash->getName() : 'None'));
           
               $data = ['nama_logo' => $a];
               $uploadPath = ROOTPATH . 'public/assets/img/custom/';
           
               if ($icon && $icon->isValid() && !$icon->hasMoved()) {
                   if (!file_exists($uploadPath . $icon->getName())) {
                       $icon->move($uploadPath, $icon->getName());
                   }
                   $data['icon'] = $icon->getName();
               }
           
               if ($dash && $dash->isValid() && !$dash->hasMoved()) {
                   if (!file_exists($uploadPath . $dash->getName())) {
                       $dash->move($uploadPath, $dash->getName());
                   }
                   $data['logos'] = $dash->getName();
               }
           
           
               $where = ['id_logo' => 1];
               $model->logActivity($user_id, 'Updated', 'User Has Updated The Logo');
               $model->edit('logo', $data, $where);
           
               return redirect()->to('setting/1');
           }
           public function dashboard()
           {
               // Start the session
               $user_id = session()->get('id_user');
           
               // Initialize the model
               $model = new M_lelang();
           
               // Fetch all logos and filter for a specific condition
               $logoData = $model->tampil('logo'); // Fetch all logos
               $filteredLogo = array_filter($logoData, function ($item) {
                   return $item->id_logo == 1; // Adjust this condition as needed
               });
           
               // Set filtered logo data
               $data['satu'] = reset($filteredLogo);
           
               // Fetch specific logo data based on conditions
               $whereLogo = array('id_logo' => 1); // Change '1' to dynamic if needed
               $data['sa'] = $model->getWhere('logo', $whereLogo);
           
               $model->logActivity($user_id, 'Login', 'User Has Log in.');
               $whereUser = array('id_user' => $user_id);
               $data['user'] = $model->getWhere('user', $whereUser);
           
               // Fetch all game data
               $data['game'] = $model->tampil('game');
           
               // Load views with the data
               echo view('header', $data);
               echo view('menu', $data);
               echo view('dashboard', $data);
               echo view('footer');
           }
           
    
	public function logout() {
        $user_id = session()->get('id_user');

            // Log the logout activity
            $model = new M_lelang();        
            $model->logActivity($user_id, 'Logout', 'User Has Logout.');
        session()->destroy();
        return redirect()->to('http://localhost:8080/home');
    }
	public function activity_log()
{
    $userLevel = session()->get('Level');
    $allowedLevels = ['admin'];

    if (in_array($userLevel, $allowedLevels)) {
        $model= new M_lelang();
        $user_id = session()->get('id_user');
        $logoData = $model->tampil('logo'); // Fetch all logos
        $filteredLogo = array_filter($logoData, function($item) {
            return $item->id_logo == 1; // Adjust this condition as needed
        });
        $data['satu'] = reset($filteredLogo);
    
        $where=array('id_user'=>session()->get('id_user'));
            $data['user']=$model->getWhere('user', $where);
        $logs = $model->getActivityLogs();
        $data['s'] = $model->tampil('user', 'id_user');
        $data['logs'] = $logs;
        $model->logActivity($user_id, 'View', 'User view Activity Log.');
        echo view('header');
        echo view('menu', $data);
        return view('activity_log', $data);
    } else {
        return redirect()->to('http://localhost:8080/home/error_404');
    }
}
public function game($id)
{
    // Start the session
    $user_id = session()->get('id_user');

    // Initialize the model
    $model = new M_lelang();

    // Fetch all logos and filter for a specific condition
    $logoData = $model->tampil('logo'); // Fetch all logos
    $filteredLogo = array_filter($logoData, function ($item) {
        return $item->id_logo == 1; // Adjust this condition as needed
    });

    // Set filtered logo data
    $data['satu'] = reset($filteredLogo);

    // Fetch specific logo data based on conditions
    $whereLogo = array('id_logo' => 1); // Change '1' to dynamic if needed
    $data['sa'] = $model->getWhere('logo', $whereLogo);

    // Fetch user data for the current session user
    $whereUser = array('id_user' => $user_id);
    $data['user'] = $model->getWhere('user', $whereUser);

    $where = array('game_id' => $id);
    $data['game'] = $model->getWhere('game', $where);
    // Load views with the data
    echo view('header', $data);
    echo view('menu1', $data);
    echo view('game', $data);
    echo view('footer');
}
public function game1()
{
    // Start the session
    $user_id = session()->get('id_user');

    // Initialize the model
    $model = new M_lelang();

    // Fetch all logos and filter for a specific condition
    $logoData = $model->tampil('logo'); // Fetch all logos
    $filteredLogo = array_filter($logoData, function ($item) {
        return $item->id_logo == 1; // Adjust this condition as needed
    });

    // Set filtered logo data
    $data['satu'] = reset($filteredLogo);

    // Fetch specific logo data based on conditions
    $whereLogo = array('id_logo' => 1); // Change '1' to dynamic if needed
    $data['sa'] = $model->getWhere('logo', $whereLogo);

    // Fetch user data for the current session user
    $whereUser = array('id_user' => $user_id);
    $data['user'] = $model->getWhere('user', $whereUser);

    // Fetch all game data
    $data['game'] = $model->Join('game', 'genre','game.genre = genre.id_genre');
    $data['genre'] = $model->tampil('genre');
    // Load views with the data
    echo view('header', $data);
    echo view('menu', $data);
    echo view('game1', $data);
    echo view('footer');
}
public function selesai($id){
    $userLevel = session()->get('level');



        $model= new M_lelang();
        $user_id = session()->get('id_user');
        // Data to be updated
        $isi = array('selesai' => 'selesai');
    
        // Condition for update
        $where = array('game_id' => $id);
    
        // Call the edit function from the model
        $model->logActivity($user_id, 'Game', 'User Has Finish Game.');
        $model->hapus('game', $where);
    return redirect()->to('game1');

}
public function tambah()
{
    // Start the session
    $user_id = session()->get('id_user');

    // Initialize the model
    $model = new M_lelang();

    // Fetch all logos and filter for a specific condition
    $logoData = $model->tampil('logo'); // Fetch all logos
    $filteredLogo = array_filter($logoData, function ($item) {
        return $item->id_logo == 1; // Adjust this condition as needed
    });

    // Set filtered logo data
    $data['satu'] = reset($filteredLogo);

    // Fetch specific logo data based on conditions
    $whereLogo = array('id_logo' => 1); // Change '1' to dynamic if needed
    $data['sa'] = $model->getWhere('logo', $whereLogo);

    // Fetch user data for the current session user
    $whereUser = array('id_user' => $user_id);
    $data['user'] = $model->getWhere('user', $whereUser);

    $data['sa'] = $model->join('game',
    'genre',
    'game.genre = genre.id_genre', []);
    $data['game'] = $model->tampil('game');
    $data['genre'] = $model->tampil('genre');

    // Load views with the data
    echo view('header', $data);
    echo view('menu', $data);
    echo view('tambah');
    echo view('footer');
}

public function aksi_tambah()
           {
               $model = new M_lelang();
               $user_id = session()->get('id_user');
               $a = $this->request->getPost('nama');
               $genre = $this->request->getPost('genre');
               $b = $this->request->getPost('Des');
               $Plart = $this->request->getPost('Plart');
               $c = $this->request->getPost('date');
               $icon2= $this->request->getFile('image2');
               $dash1 = $this->request->getFile('image1');
               $icon3 = $this->request->getFile('image3');
               $icon5 = $this->request->getFile('image4');
               $icon4 = $this->request->getFile('trailer');
               $logo = $this->request->getFile('logo');

           
               // Debugging: Log received data
               log_message('debug', 'game Name: ' . $a);
               log_message('debug', 'Date Name: ' . $b);
               log_message('debug', 'Describtiom Name: ' . $c);
               log_message('debug', 'logo: ' . ($logo ? $logo->getName() : 'None'));
               log_message('debug', 'image1: ' . ($dash1 ? $dash1->getName() : 'None'));
               log_message('debug', 'image2: ' . ($icon2 ? $icon2->getName() : 'None'));
               log_message('debug', 'image3: ' . ($icon3 ? $icon3->getName() : 'None'));
               log_message('debug', 'image4: ' . ($icon5 ? $icon5->getName() : 'None'));
               log_message('debug', 'trailer: ' . ($icon4 ? $icon4->getName() : 'None'));

               $data = ['game' => $a,
                        'genre' => $genre,
                        'describsi' => $b,
                        'plartform' => $Plart,
                        'tanggal_keluar' => $c,
                        'selesai' => "belum"
                    ];
               $uploadPath = ROOTPATH . 'public/assets/img/custom/';
           
               if ($logo && $logo->isValid() && !$logo->hasMoved()) {
                   if (!file_exists($uploadPath . $logo->getName())) {
                       $logo->move($uploadPath, $logo->getName());
                   }
                   $data['logo'] = $logo->getName();
               }
           
               if ($dash1 && $dash1->isValid() && !$dash1->hasMoved()) {
                   if (!file_exists($uploadPath . $dash1->getName())) {
                       $dash1->move($uploadPath, $dash1->getName());
                   }
                   $data['foto_1'] = $dash1->getName();
               }
               if ($icon2 && $icon2->isValid() && !$icon2->hasMoved()) {
                if (!file_exists($uploadPath . $icon2->getName())) {
                    $icon2->move($uploadPath, $icon2->getName());
                }
                $data['foto_2'] = $icon2->getName();
            }
            if ($icon3 && $icon3->isValid() && !$icon3->hasMoved()) {
                if (!file_exists($uploadPath . $icon3->getName())) {
                    $icon3->move($uploadPath, $icon3->getName());
                }
                $data['foto_3'] = $icon3->getName();
            }
            if ($icon5 && $icon5->isValid() && !$icon5->hasMoved()) {
                if (!file_exists($uploadPath . $icon5->getName())) {
                    $icon5->move($uploadPath, $icon5->getName());
                }
                $data['foto_4'] = $icon5->getName();
            }
            if ($icon4 && $icon4->isValid() && !$icon4->hasMoved()) {
                if (!file_exists($uploadPath . $icon4->getName())) {
                    $icon4->move($uploadPath, $icon4->getName());
                }
                $data['trailer'] = $icon4->getName();
            }
           

               $model->logActivity($user_id, 'Add', 'User Has Add Game');
               $model->tambah('game', $data);
           print_r($data);
               return redirect()->to('game1');
           }    
           public function edit($id)
           {
               // Start the session
               $user_id = session()->get('id_user');
           
               // Initialize the model
               $model = new M_lelang();
           
               // Fetch all logos and filter for a specific condition
               $logoData = $model->tampil('logo'); // Fetch all logos
               $filteredLogo = array_filter($logoData, function ($item) {
                   return $item->id_logo == 1; // Adjust this condition as needed
               });
           
               // Set filtered logo data
               $data['satu'] = reset($filteredLogo);
           
               // Fetch specific logo data based on conditions
               $whereLogo = array('id_logo' => 1); // Change '1' to dynamic if needed
               $data['sa'] = $model->getWhere('logo', $whereLogo);
           
               // Fetch user data for the current session user
               $whereUser = array('id_user' => $user_id);
               $data['user'] = $model->getWhere('user', $whereUser);
           
               // Fetch all game data
               $where = array('game_id' => $id);
               $data['game'] = $model->getWhere('game', $where);
           
               // Load views with the data
               echo view('header', $data);
               echo view('menu', $data);
               echo view('edit', $data);
               echo view('footer');
           }
           public function aksi_edit()
{
    $model = new M_lelang();
    $user_id = session()->get('id_user');
    $id = $this->request->getPost('id'); // Get the game ID from the hidden input field
    $a = $this->request->getPost('nama');
    $b = $this->request->getPost('Des');
    $c = $this->request->getPost('date');
    $icon2 = $this->request->getFile('image2');
    $dash1 = $this->request->getFile('image1');
    $icon3 = $this->request->getFile('image3');
    $icon4 = $this->request->getFile('trailer');
    $logo = $this->request->getFile('logo');

    // Debugging: Log received data
    log_message('debug', 'game Name: ' . $a);
    log_message('debug', 'Date Name: ' . $b);
    log_message('debug', 'Description Name: ' . $c);
    log_message('debug', 'logo: ' . ($logo ? $logo->getName() : 'None'));
    log_message('debug', 'image1: ' . ($dash1 ? $dash1->getName() : 'None'));
    log_message('debug', 'image2: ' . ($icon2 ? $icon2->getName() : 'None'));
    log_message('debug', 'image3: ' . ($icon3 ? $icon3->getName() : 'None'));
    log_message('debug', 'trailer: ' . ($icon4 ? $icon4->getName() : 'None'));

    // Prepare the data to update
    $data = [
        'game' => $a,
        'describsi' => $b,
        'tanggal_keluar' => $c,
    ];

    $uploadPath = ROOTPATH . 'public/assets/img/custom/';

    // Handle file uploads
    $currentGame = $model->getWhere('game', ['game_id' => $id]); // Get current game data
    

    // Check and upload logo if a new file is provided
    if ($logo && $logo->isValid() && !$logo->hasMoved()) {
        // Move the uploaded file
        $logo->move($uploadPath, $logo->getName());
        $data['logo'] = $logo->getName(); // Assign new logo name
    } else {
        // Retain the old logo if no new file is uploaded
        $data['logo'] = $currentGame->logo;
    }

    // Check and upload image1 if a new file is provided
    if ($dash1 && $dash1->isValid() && !$dash1->hasMoved()) {
        $dash1->move($uploadPath, $dash1->getName());
        $data['foto_1'] = $dash1->getName(); // Assign new image1 name
    } else {
        $data['foto_1'] = $currentGame->foto_1; // Retain the old image1 if no new file is uploaded
    }

    // Check and upload image2 if a new file is provided
    if ($icon2 && $icon2->isValid() && !$icon2->hasMoved()) {
        $icon2->move($uploadPath, $icon2->getName());
        $data['foto_2'] = $icon2->getName(); // Assign new image2 name
    } else {
        $data['foto_2'] = $currentGame->foto_2; // Retain the old image2 if no new file is uploaded
    }

    // Check and upload image3 if a new file is provided
    if ($icon3 && $icon3->isValid() && !$icon3->hasMoved()) {
        $icon3->move($uploadPath, $icon3->getName());
        $data['foto_3'] = $icon3->getName(); // Assign new image3 name
    } else {
        $data['foto_3'] = $currentGame->foto_3; // Retain the old image3 if no new file is uploaded
    }

    // Check and upload trailer if a new file is provided
    if ($icon4 && $icon4->isValid() && !$icon4->hasMoved()) {
        $icon4->move($uploadPath, $icon4->getName());
        $data['trailer'] = $icon4->getName(); // Assign new trailer name
    } else {
        $data['trailer'] = $currentGame->trailer; // Retain the old trailer if no new file is uploaded
    }

    // Define the `where` condition for the update
    $where = ['game_id' => $id];

    // Log the activity and update the database
    $model->logActivity($user_id, 'UPDATE', 'User has edited Game');
    $model->edit('game', $data, $where);

    // Debugging: Print data for testing
    print_r($data);

    // Redirect back to the game list
    return redirect()->to('game1');
}

           
}
