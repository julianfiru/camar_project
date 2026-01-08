<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use App\Models\Auditor\Auditor;
use App\Models\Buyer\Buyer;
use App\Models\Buyer\BuyerDocumentation;
use App\Models\Seller\Mrv;
use App\Models\Seller\Order;
use App\Models\Seller\Project;
use App\Models\Seller\ProjectCategory;
use App\Models\Seller\ProjectViews;
use App\Models\Seller\Seller;
use App\Models\Seller\SellerBadge;
use App\Models\Seller\SellerBanking;
use App\Models\Seller\SellerDocumentation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'email' => 'asd@seller.com',
            'password_hash' => bcrypt('asd'),
            'photo_url' => 'urlProfil/User1.gif',
            'role' => 'Seller',
            'status' => 2,
            'created_at' => now(),
            'last_login' => now(),
        ]);
        User::create([
            'email' => 'asd@buyer.com',
            'password_hash' => bcrypt('asd'),
            'photo_url' => 'urlProfil/User1.gif',
            'role' => 'Buyer',
            'status' => 2,
            'created_at' => now(),
            'last_login' => now(),
        ]);
        User::create([
            'email' => 'asd@auditor.com',
            'password_hash' => bcrypt('asd'),
            'photo_url' => 'urlProfil/User1.gif',
            'role' => 'Auditor',
            'status' => 2,
            'created_at' => now(),
            'last_login' => now(),
        ]);
        User::create([
            'email' => 'asd@admin.com',
            'password_hash' => bcrypt('asd'),
            'photo_url' => 'urlProfil/User1.gif',
            'role' => 'Admin',
            'status' => 2,
            'created_at' => now(),
            'last_login' => now(),
        ]);
        Admin::create([
            'user_id' => '3',
        ]);
        Auditor::create([
            'user_id' => '3',
            'name' => 'asd',
            'position' => 'Senior',
        ]);
        Seller::create([
            'user_id' => 1,
            'company_name' => 'asd',
            'country' => 'asd, asd',
            'nib' => '1234567890123',
            'npwp' => '01.234.567.8-901.000',
            'website' => 'www.asd.com',
            'phone_number' => '+6281234567890',
            'bio' => 'asd',
            'desc' => 'asd',
            'address' => 'Jl. asd',
            'verified_at' => now(),
        ]);
        SellerBadge::create([
            'seller_id' => 1,
            'total_relized_ton' => 2000000,
            'assigned_at' => now(),
        ]);
        SellerBanking::create([
            'seller_id' => 1,
            'bank_name' => 'Bank Central Asia (BCA)',
            'account_number' => '1234567890',
            'bank_branch' => 'KCU Jakarta Gatot Subroto',
        ]);
        SellerDocumentation::create([
            'seller_id' => 1,
            'document_name' => 'Akta Pendirian Perusahaan',
            'document_type' => 'PDF',
            'size' => 4500 ,
            'document_status' => 2,
            'document_url' => 'https://claude.ai/new',
            'submitted_at' => now(),
        ]);
        Buyer::create([
            'user_id' => 2,
            'company_name' => 'asd',
            'country' => 'asd, asd',
            'nib' => '1234567890123',
            'npwp' => '01.234.567.8-901.000',
            'website' => 'www.asd.com',
            'phone_number' => '+6281234567890',
            'bio' => 'asd',
            'desc' => 'asd',
            'address' => 'Jl. asd',
            'verified_at' => now(),
        ]);
        // // BuyerBadge::create([
            //     'seller_id' => 1,
            //     'total_relized_ton' => 2000000,
            //     'assigned_at' => now(),
            // ]);
            // BuyerBanking::create([
            //     'seller_id' => 1,
            //     'bank_name' => 'Bank Central Asia (BCA)',
            //     'account_number' => '1234567890',
            //     'bank_branch' => 'KCU Jakarta Gatot Subroto',
        // // ]);
        BuyerDocumentation::create([
            'buyer_id' => 1,
            'document_name' => 'Akta Pendirian Perusahaan',
            'document_type' => 'PDF',
            'size' => 4500 ,
            'document_status' => 2,
            'document_url' => 'https://claude.ai/new',
        ]);
        ProjectCategory::create([
            'category_name' => 'Carbon Removal',
        ]);
        ProjectCategory::create([
            'category_name' => 'Emission Reduction',
        ]);
        ProjectCategory::create([
            'category_name' => 'Removal + Reduction',
        ]);
        Project::create([
            'seller_id' => 1,
            'sku' => 'asd1',
            'project_name' => 'asd1',
            'category_id' => 1,
            'location' => 'asd1',
            'price' => 250000,
            'total_capacity_ton' => 1000,
            'available_capacity_ton' => 550,
            'duration_years' => 2,
            'status' => 2,
            'photo_url' => 'urlProfil/User1.gif',
            'desc' => 'asd',
            'created_at' => '2025-01-04 17:09:07',
        ]);
        Mrv::create([
            'project_id' => 1,
            'mrv_name' => 'MRV Report Q1 2025',
            'status' => 2,
            'size' => 4000,
            'document_url' => 'https://claude.ai/new',
            'submitted_at' => '2025-04-05 10:00:00',
        ]);
        Project::create([
            'seller_id' => 1,
            'sku' => 'asd2',
            'project_name' => 'asd2',
            'category_id' => 2,
            'location' => 'asd2',
            'price' => 140000,
            'total_capacity_ton' => 1000,
            'available_capacity_ton' => 0,
            'duration_years' => 2,
            'status' => 2,
            'photo_url' => 'urlProfil/User1.gif',
            'desc' => 'asd',
            'created_at' => now(),
        ]);
        Project::create([
            'seller_id' => 1,
            'sku' => 'asd3',
            'project_name' => 'asd3',
            'category_id' => 3,
            'location' => 'asd3',
            'price' => 120000,
            'total_capacity_ton' => 1000,
            'available_capacity_ton' => 1000,
            'duration_years' => 2,
            'status' => 1,
            'photo_url' => 'urlProfil/User1.gif',
            'desc' => 'asd',
            'created_at' => now(),
        ]);
        Project::create([
            'seller_id' => 1,
            'sku' => 'asd4',
            'project_name' => 'asd4',
            'category_id' => 3,
            'location' => 'asd4',
            'price' => 150000,
            'total_capacity_ton' => 1000,
            'available_capacity_ton' => 1000,
            'duration_years' => 2,
            'status' => 0,
            'photo_url' => 'urlProfil/User1.gif',
            'desc' => 'asd',
            'created_at' => now(),
        ]);
        Order::create([
            'buyer_id' => 1,
            'project_id' => 1,
            'offset_amount_ton' => 450,
            'order_status' => 2,
            'created_at' => now(),
        ]);
        Order::create([
            'buyer_id' => 1,
            'project_id' => 3,
            'offset_amount_ton' => 500,
            'order_status' => 1,
            'created_at' => now(),
        ]);
        Order::create([
            'buyer_id' => 1,
            'project_id' => 4,
            'offset_amount_ton' => 400,
            'order_status' => 0,
            'created_at' => now(),
        ]);
        Order::create([
            'buyer_id' => 1,
            'project_id' => 2,
            'offset_amount_ton' => 400,
            'order_status' => 2,
            'created_at' => now(),
        ]);
        ProjectViews::create([
            'project_id' => 1,
            'user_id' => 2,
            'created_at' => now(),
        ]);
        ProjectViews::create([
            'project_id' => 1,
            'user_id' => 3,
            'created_at' => now(),
        ]);
        ProjectViews::create([
            'project_id' => 1,
            'user_id' => 4,
            'created_at' => now(),
        ]);
    }
}