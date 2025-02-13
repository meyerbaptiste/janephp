<?php

namespace CreditSafe\API\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use CreditSafe\API\Runtime\Normalizer\CheckArray;
use CreditSafe\API\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\HttpKernel\Kernel;
if (!class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class GbCompanyReportExampleResponseReportAdditionalInformationMortgageDetailsItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
        {
            return $type === \CreditSafe\API\Model\GbCompanyReportExampleResponseReportAdditionalInformationMortgageDetailsItem::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \CreditSafe\API\Model\GbCompanyReportExampleResponseReportAdditionalInformationMortgageDetailsItem::class;
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \CreditSafe\API\Model\GbCompanyReportExampleResponseReportAdditionalInformationMortgageDetailsItem();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('mortgageType', $data)) {
                $object->setMortgageType($data['mortgageType']);
                unset($data['mortgageType']);
            }
            if (\array_key_exists('dateChargeCreated', $data)) {
                $object->setDateChargeCreated($data['dateChargeCreated']);
                unset($data['dateChargeCreated']);
            }
            if (\array_key_exists('dateChargeRegistered', $data)) {
                $object->setDateChargeRegistered($data['dateChargeRegistered']);
                unset($data['dateChargeRegistered']);
            }
            if (\array_key_exists('status', $data)) {
                $object->setStatus($data['status']);
                unset($data['status']);
            }
            if (\array_key_exists('personsEntitled', $data)) {
                $object->setPersonsEntitled($data['personsEntitled']);
                unset($data['personsEntitled']);
            }
            if (\array_key_exists('amountSecured', $data)) {
                $object->setAmountSecured($data['amountSecured']);
                unset($data['amountSecured']);
            }
            if (\array_key_exists('details', $data)) {
                $object->setDetails($data['details']);
                unset($data['details']);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('mortgageType') && null !== $object->getMortgageType()) {
                $data['mortgageType'] = $object->getMortgageType();
            }
            if ($object->isInitialized('dateChargeCreated') && null !== $object->getDateChargeCreated()) {
                $data['dateChargeCreated'] = $object->getDateChargeCreated();
            }
            if ($object->isInitialized('dateChargeRegistered') && null !== $object->getDateChargeRegistered()) {
                $data['dateChargeRegistered'] = $object->getDateChargeRegistered();
            }
            if ($object->isInitialized('status') && null !== $object->getStatus()) {
                $data['status'] = $object->getStatus();
            }
            if ($object->isInitialized('personsEntitled') && null !== $object->getPersonsEntitled()) {
                $data['personsEntitled'] = $object->getPersonsEntitled();
            }
            if ($object->isInitialized('amountSecured') && null !== $object->getAmountSecured()) {
                $data['amountSecured'] = $object->getAmountSecured();
            }
            if ($object->isInitialized('details') && null !== $object->getDetails()) {
                $data['details'] = $object->getDetails();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\CreditSafe\API\Model\GbCompanyReportExampleResponseReportAdditionalInformationMortgageDetailsItem::class => false];
        }
    }
} else {
    class GbCompanyReportExampleResponseReportAdditionalInformationMortgageDetailsItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []): bool
        {
            return $type === \CreditSafe\API\Model\GbCompanyReportExampleResponseReportAdditionalInformationMortgageDetailsItem::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \CreditSafe\API\Model\GbCompanyReportExampleResponseReportAdditionalInformationMortgageDetailsItem::class;
        }
        /**
         * @return mixed
         */
        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \CreditSafe\API\Model\GbCompanyReportExampleResponseReportAdditionalInformationMortgageDetailsItem();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('mortgageType', $data)) {
                $object->setMortgageType($data['mortgageType']);
                unset($data['mortgageType']);
            }
            if (\array_key_exists('dateChargeCreated', $data)) {
                $object->setDateChargeCreated($data['dateChargeCreated']);
                unset($data['dateChargeCreated']);
            }
            if (\array_key_exists('dateChargeRegistered', $data)) {
                $object->setDateChargeRegistered($data['dateChargeRegistered']);
                unset($data['dateChargeRegistered']);
            }
            if (\array_key_exists('status', $data)) {
                $object->setStatus($data['status']);
                unset($data['status']);
            }
            if (\array_key_exists('personsEntitled', $data)) {
                $object->setPersonsEntitled($data['personsEntitled']);
                unset($data['personsEntitled']);
            }
            if (\array_key_exists('amountSecured', $data)) {
                $object->setAmountSecured($data['amountSecured']);
                unset($data['amountSecured']);
            }
            if (\array_key_exists('details', $data)) {
                $object->setDetails($data['details']);
                unset($data['details']);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('mortgageType') && null !== $object->getMortgageType()) {
                $data['mortgageType'] = $object->getMortgageType();
            }
            if ($object->isInitialized('dateChargeCreated') && null !== $object->getDateChargeCreated()) {
                $data['dateChargeCreated'] = $object->getDateChargeCreated();
            }
            if ($object->isInitialized('dateChargeRegistered') && null !== $object->getDateChargeRegistered()) {
                $data['dateChargeRegistered'] = $object->getDateChargeRegistered();
            }
            if ($object->isInitialized('status') && null !== $object->getStatus()) {
                $data['status'] = $object->getStatus();
            }
            if ($object->isInitialized('personsEntitled') && null !== $object->getPersonsEntitled()) {
                $data['personsEntitled'] = $object->getPersonsEntitled();
            }
            if ($object->isInitialized('amountSecured') && null !== $object->getAmountSecured()) {
                $data['amountSecured'] = $object->getAmountSecured();
            }
            if ($object->isInitialized('details') && null !== $object->getDetails()) {
                $data['details'] = $object->getDetails();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\CreditSafe\API\Model\GbCompanyReportExampleResponseReportAdditionalInformationMortgageDetailsItem::class => false];
        }
    }
}