<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProjectController extends AbstractController
{
    #[Route('/', name: 'app_projects')]
    public function index(ProjectRepository $projectRepo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $projects = $projectRepo->findAll();
        return $this->render('project/index.html.twig', [
            'projects' => $projects,
        ]);
    }

    #[Route('/project/{id}', name: 'app_project')]
    public function showProject(string $id, ProjectRepository $projectRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $project = $projectRepository->find($id);

        return $this->render('project/project.html.twig', [
            'project' => $project
        ]);
    }
}
