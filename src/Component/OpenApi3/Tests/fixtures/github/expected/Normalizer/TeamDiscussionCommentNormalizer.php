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
    class TeamDiscussionCommentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
        {
            return $type === \Github\Model\TeamDiscussionComment::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \Github\Model\TeamDiscussionComment::class;
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Github\Model\TeamDiscussionComment();
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\TeamDiscussionCommentConstraint());
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('author', $data) && $data['author'] !== null) {
                $object->setAuthor($this->denormalizer->denormalize($data['author'], \Github\Model\TeamDiscussionCommentAuthor::class, 'json', $context));
                unset($data['author']);
            }
            elseif (\array_key_exists('author', $data) && $data['author'] === null) {
                $object->setAuthor(null);
            }
            if (\array_key_exists('body', $data)) {
                $object->setBody($data['body']);
                unset($data['body']);
            }
            if (\array_key_exists('body_html', $data)) {
                $object->setBodyHtml($data['body_html']);
                unset($data['body_html']);
            }
            if (\array_key_exists('body_version', $data)) {
                $object->setBodyVersion($data['body_version']);
                unset($data['body_version']);
            }
            if (\array_key_exists('created_at', $data)) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            }
            if (\array_key_exists('last_edited_at', $data) && $data['last_edited_at'] !== null) {
                $object->setLastEditedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['last_edited_at']));
                unset($data['last_edited_at']);
            }
            elseif (\array_key_exists('last_edited_at', $data) && $data['last_edited_at'] === null) {
                $object->setLastEditedAt(null);
            }
            if (\array_key_exists('discussion_url', $data)) {
                $object->setDiscussionUrl($data['discussion_url']);
                unset($data['discussion_url']);
            }
            if (\array_key_exists('html_url', $data)) {
                $object->setHtmlUrl($data['html_url']);
                unset($data['html_url']);
            }
            if (\array_key_exists('node_id', $data)) {
                $object->setNodeId($data['node_id']);
                unset($data['node_id']);
            }
            if (\array_key_exists('number', $data)) {
                $object->setNumber($data['number']);
                unset($data['number']);
            }
            if (\array_key_exists('updated_at', $data)) {
                $object->setUpdatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['updated_at']));
                unset($data['updated_at']);
            }
            if (\array_key_exists('url', $data)) {
                $object->setUrl($data['url']);
                unset($data['url']);
            }
            if (\array_key_exists('reactions', $data)) {
                $object->setReactions($this->denormalizer->denormalize($data['reactions'], \Github\Model\ReactionRollup::class, 'json', $context));
                unset($data['reactions']);
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
            $data['author'] = $this->normalizer->normalize($object->getAuthor(), 'json', $context);
            $data['body'] = $object->getBody();
            $data['body_html'] = $object->getBodyHtml();
            $data['body_version'] = $object->getBodyVersion();
            $data['created_at'] = $object->getCreatedAt()?->format('Y-m-d\TH:i:sP');
            $data['last_edited_at'] = $object->getLastEditedAt()->format('Y-m-d\TH:i:sP');
            $data['discussion_url'] = $object->getDiscussionUrl();
            $data['html_url'] = $object->getHtmlUrl();
            $data['node_id'] = $object->getNodeId();
            $data['number'] = $object->getNumber();
            $data['updated_at'] = $object->getUpdatedAt()?->format('Y-m-d\TH:i:sP');
            $data['url'] = $object->getUrl();
            if ($object->isInitialized('reactions') && null !== $object->getReactions()) {
                $data['reactions'] = $this->normalizer->normalize($object->getReactions(), 'json', $context);
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\TeamDiscussionCommentConstraint());
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Github\Model\TeamDiscussionComment::class => false];
        }
    }
} else {
    class TeamDiscussionCommentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []): bool
        {
            return $type === \Github\Model\TeamDiscussionComment::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \Github\Model\TeamDiscussionComment::class;
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
            $object = new \Github\Model\TeamDiscussionComment();
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\TeamDiscussionCommentConstraint());
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('author', $data) && $data['author'] !== null) {
                $object->setAuthor($this->denormalizer->denormalize($data['author'], \Github\Model\TeamDiscussionCommentAuthor::class, 'json', $context));
                unset($data['author']);
            }
            elseif (\array_key_exists('author', $data) && $data['author'] === null) {
                $object->setAuthor(null);
            }
            if (\array_key_exists('body', $data)) {
                $object->setBody($data['body']);
                unset($data['body']);
            }
            if (\array_key_exists('body_html', $data)) {
                $object->setBodyHtml($data['body_html']);
                unset($data['body_html']);
            }
            if (\array_key_exists('body_version', $data)) {
                $object->setBodyVersion($data['body_version']);
                unset($data['body_version']);
            }
            if (\array_key_exists('created_at', $data)) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            }
            if (\array_key_exists('last_edited_at', $data) && $data['last_edited_at'] !== null) {
                $object->setLastEditedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['last_edited_at']));
                unset($data['last_edited_at']);
            }
            elseif (\array_key_exists('last_edited_at', $data) && $data['last_edited_at'] === null) {
                $object->setLastEditedAt(null);
            }
            if (\array_key_exists('discussion_url', $data)) {
                $object->setDiscussionUrl($data['discussion_url']);
                unset($data['discussion_url']);
            }
            if (\array_key_exists('html_url', $data)) {
                $object->setHtmlUrl($data['html_url']);
                unset($data['html_url']);
            }
            if (\array_key_exists('node_id', $data)) {
                $object->setNodeId($data['node_id']);
                unset($data['node_id']);
            }
            if (\array_key_exists('number', $data)) {
                $object->setNumber($data['number']);
                unset($data['number']);
            }
            if (\array_key_exists('updated_at', $data)) {
                $object->setUpdatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['updated_at']));
                unset($data['updated_at']);
            }
            if (\array_key_exists('url', $data)) {
                $object->setUrl($data['url']);
                unset($data['url']);
            }
            if (\array_key_exists('reactions', $data)) {
                $object->setReactions($this->denormalizer->denormalize($data['reactions'], \Github\Model\ReactionRollup::class, 'json', $context));
                unset($data['reactions']);
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
            $data['author'] = $this->normalizer->normalize($object->getAuthor(), 'json', $context);
            $data['body'] = $object->getBody();
            $data['body_html'] = $object->getBodyHtml();
            $data['body_version'] = $object->getBodyVersion();
            $data['created_at'] = $object->getCreatedAt()?->format('Y-m-d\TH:i:sP');
            $data['last_edited_at'] = $object->getLastEditedAt()->format('Y-m-d\TH:i:sP');
            $data['discussion_url'] = $object->getDiscussionUrl();
            $data['html_url'] = $object->getHtmlUrl();
            $data['node_id'] = $object->getNodeId();
            $data['number'] = $object->getNumber();
            $data['updated_at'] = $object->getUpdatedAt()?->format('Y-m-d\TH:i:sP');
            $data['url'] = $object->getUrl();
            if ($object->isInitialized('reactions') && null !== $object->getReactions()) {
                $data['reactions'] = $this->normalizer->normalize($object->getReactions(), 'json', $context);
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\TeamDiscussionCommentConstraint());
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Github\Model\TeamDiscussionComment::class => false];
        }
    }
}