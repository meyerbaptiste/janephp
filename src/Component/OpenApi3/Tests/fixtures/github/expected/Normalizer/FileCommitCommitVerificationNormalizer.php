<?php

namespace Github\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Github\Runtime\Normalizer\CheckArray;
use Github\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\HttpKernel\Kernel;
if (!class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class FileCommitCommitVerificationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
        {
            return $type === \Github\Model\FileCommitCommitVerification::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \Github\Model\FileCommitCommitVerification::class;
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Github\Model\FileCommitCommitVerification();
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\FileCommitCommitVerificationConstraint());
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('verified', $data)) {
                $object->setVerified($data['verified']);
                unset($data['verified']);
            }
            if (\array_key_exists('reason', $data)) {
                $object->setReason($data['reason']);
                unset($data['reason']);
            }
            if (\array_key_exists('signature', $data) && $data['signature'] !== null) {
                $object->setSignature($data['signature']);
                unset($data['signature']);
            }
            elseif (\array_key_exists('signature', $data) && $data['signature'] === null) {
                $object->setSignature(null);
            }
            if (\array_key_exists('payload', $data) && $data['payload'] !== null) {
                $object->setPayload($data['payload']);
                unset($data['payload']);
            }
            elseif (\array_key_exists('payload', $data) && $data['payload'] === null) {
                $object->setPayload(null);
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
            if ($object->isInitialized('verified') && null !== $object->getVerified()) {
                $data['verified'] = $object->getVerified();
            }
            if ($object->isInitialized('reason') && null !== $object->getReason()) {
                $data['reason'] = $object->getReason();
            }
            if ($object->isInitialized('signature') && null !== $object->getSignature()) {
                $data['signature'] = $object->getSignature();
            }
            if ($object->isInitialized('payload') && null !== $object->getPayload()) {
                $data['payload'] = $object->getPayload();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\FileCommitCommitVerificationConstraint());
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Github\Model\FileCommitCommitVerification::class => false];
        }
    }
} else {
    class FileCommitCommitVerificationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []): bool
        {
            return $type === \Github\Model\FileCommitCommitVerification::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \Github\Model\FileCommitCommitVerification::class;
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
            $object = new \Github\Model\FileCommitCommitVerification();
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\FileCommitCommitVerificationConstraint());
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('verified', $data)) {
                $object->setVerified($data['verified']);
                unset($data['verified']);
            }
            if (\array_key_exists('reason', $data)) {
                $object->setReason($data['reason']);
                unset($data['reason']);
            }
            if (\array_key_exists('signature', $data) && $data['signature'] !== null) {
                $object->setSignature($data['signature']);
                unset($data['signature']);
            }
            elseif (\array_key_exists('signature', $data) && $data['signature'] === null) {
                $object->setSignature(null);
            }
            if (\array_key_exists('payload', $data) && $data['payload'] !== null) {
                $object->setPayload($data['payload']);
                unset($data['payload']);
            }
            elseif (\array_key_exists('payload', $data) && $data['payload'] === null) {
                $object->setPayload(null);
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
            if ($object->isInitialized('verified') && null !== $object->getVerified()) {
                $data['verified'] = $object->getVerified();
            }
            if ($object->isInitialized('reason') && null !== $object->getReason()) {
                $data['reason'] = $object->getReason();
            }
            if ($object->isInitialized('signature') && null !== $object->getSignature()) {
                $data['signature'] = $object->getSignature();
            }
            if ($object->isInitialized('payload') && null !== $object->getPayload()) {
                $data['payload'] = $object->getPayload();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\FileCommitCommitVerificationConstraint());
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Github\Model\FileCommitCommitVerification::class => false];
        }
    }
}