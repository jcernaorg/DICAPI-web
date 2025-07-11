<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Blog;
use Illuminate\Support\Facades\File;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap.xml for SEO';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating sitemap.xml...');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // Páginas estáticas
        $staticPages = [
            '' => '1.0',
            '/about' => '0.8',
            '/programs' => '0.8',
            '/contact' => '0.7',
            '/blog' => '0.9',
            '/donations' => '0.8',
            '/reviews' => '0.7',
            '/teams' => '0.7',
            '/mision' => '0.8',
            '/vision' => '0.8',
            '/privacy-policy' => '0.5',
            '/terms-conditions' => '0.5',
        ];

        foreach ($staticPages as $page => $priority) {
            $xml .= $this->generateUrlTag($page, $priority);
        }

        // Páginas de blog dinámicas
        $blogs = Blog::where('is_published', true)->get();
        foreach ($blogs as $blog) {
            $xml .= $this->generateUrlTag('/blog/' . $blog->slug, '0.7', $blog->updated_at);
        }

        $xml .= '</urlset>';

        // Guardar el sitemap
        File::put(public_path('sitemap.xml'), $xml);

        $this->info('Sitemap generated successfully at: ' . public_path('sitemap.xml'));
    }

    private function generateUrlTag($path, $priority, $lastmod = null)
    {
        $url = url($path);
        $xml = "  <url>\n";
        $xml .= "    <loc>{$url}</loc>\n";
        
        if ($lastmod) {
            $xml .= "    <lastmod>{$lastmod->toISOString()}</lastmod>\n";
        } else {
            $xml .= "    <lastmod>" . now()->toISOString() . "</lastmod>\n";
        }
        
        $xml .= "    <changefreq>weekly</changefreq>\n";
        $xml .= "    <priority>{$priority}</priority>\n";
        $xml .= "  </url>\n";
        
        return $xml;
    }
}
