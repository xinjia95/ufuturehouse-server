<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Command;

use FOS\UserBundle\Entity\UserManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Ufuturelabs\Ufuturehouse\Server\BackendBundle\Entity\Company;
use Ufuturelabs\Ufuturehouse\Server\BackendBundle\Entity\User;

class InstallCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('ufuturehouse:install')
            ->setDescription('uFutureHouse Server installer');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var \Symfony\Component\Console\Helper\QuestionHelper $helper */
        $helper = $this->getHelper('question');

        do
        {
            $rootPasswordQuestion = new Question('<question>Password for superadmin:</question> ');
            $rootPasswordQuestion->setValidator(function($value)
            {
                if (trim($value) == '')
                {
                    throw new \Exception('The password can not be empty');
                }

                if (strlen(trim($value)) < 8)
                {
                    throw new \Exception('The password must be at least 8 characters');
                }

                return $value;
            });
            $rootPasswordQuestion->setHidden(true);

            $rootPassword = $helper->ask($input, $output, $rootPasswordQuestion);

            $rootPasswordRepeatQuestion = new Question('<question>Repeat password for superadmin:</question> ');
            $rootPasswordRepeatQuestion->setHidden(true);

            $rootPasswordRepeat = $helper->ask($input, $output, $rootPasswordRepeatQuestion);

            $rootPasswordSet = true;

            /** @var UserManager $userManager */
            $userManager = $this->getContainer()->get('fos_user.user_manager');

            /** @var User $user */
            $user = $userManager->createUser();
            $user->setUsername('root');
            $user->setPlainPassword($rootPassword);
            $user->setRoles(array('ROLE_SUPER_ADMIN'));
            $user->setName('root');
            $user->setSurname('');
            $user->setEmail('');
            $user->setTelephone('');
            $user->setEnabled(true);

            $userManager->updateUser($user);

            if ($rootPassword != $rootPasswordRepeat)
            {
                $output->writeln('<error>Passwords do not match</error>\n');
                $rootPasswordSet = false;
            }

        } while (!$rootPasswordSet);

        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        $company = new Company();
        $company->setName($this->getContainer()->getParameter('ufuturehouse.company.name'));
        $company->setEmail($this->getContainer()->getParameter('ufuturehouse.company.email'));

        $em->persist($company);
        $em->flush();

        $output->writeln('<info>uFutureHouse Server has been successfully installed</info>');
    }

    protected function runCommand($command, InputInterface $input, OutputInterface $output)
    {
        $this
            ->getApplication()
            ->find($command)
            ->run($input, $output);
    }
}
